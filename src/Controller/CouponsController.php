<?php
namespace App\Controller;

use stdClass;
use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class CouponsController extends AppController
{

    public function index()
    {
        
    }

    public function search()
    {
        if ( ! $this->request->is('post')){
            throw new NotFoundException();
        }

        $response = new stdClass();
        $response->status = false;
        $response->message = 'Error';
        $response->total = 0;
        $response->data = [];

        $keyword = $this->request->data('keyword');

        if ($keyword == '') {
            $response->status = false;
            $response->message = 'Empty keyword';

            $this->response->type('json');
            $this->response->body(json_encode($response));

            return $this->response;
        }

        $coupons = $this->Coupons->find('all')
            ->where([
                'Coupons.coupon_title LIKE' => '%'.$keyword.'%',
            ])
            ->orWhere([
                'Coupons.coupon_description LIKE' => '%'.$keyword.'%',
            ])
            ->orWhere([
                'Coupons.tags LIKE' => '%'.$keyword.'%',
            ])
            ->order([
                'Coupons.end_date' => 'DESC'
            ])
            ->toArray();

        if(count($coupons) > 0)
        {
            

            $mark = $this->markCoupons($coupons, $keyword);

            if($mark == false)
            {
                $response->status = false;
                $response->message = 'Error on save search data';

                $this->response->type('json');
                $this->response->body(json_encode($response));

                return $this->response;
            }

            $response->status = true;
            $response->message = 'Ok, finded';
            $response->total = count($coupons);
            $response->data['coupons'] = $coupons;
        }
        else
        {
            $response->status = false;
            $response->message = 'Empty search';
        }


        $this->response->type('json');
        $this->response->body(json_encode($response));

        return $this->response;
    }

    public function stats()
    {
        $coupons = $this->Coupons->find('all')
            ->contain(['SearchStats' => function($q) {
                return $q
                    ->order(['SearchStats.count_total' => 'DESC']);
            }])
            ->where([
                'Coupons.count_search_total > ' => 0
            ])
            ->order([
                'Coupons.count_search_total' => 'DESC'
            ])
            ->limit(20)
            ->toArray();

        $this->set('coupons', $coupons);
    }

    function markCoupons($coupons = array(), $keyword = null)
    {
        if(count($coupons) > 0 && $keyword != null)
        {
            $search_stats = array();
            $x=0;

            foreach($coupons as $coupon)
            {
                $search_stats_coupon = $this->Coupons->SearchStats->find('all')
                    ->where([
                        'SearchStats.coupon_id' => $coupon->id,
                        'SearchStats.search_keyword' => strtolower($keyword)
                    ])
                    ->first();

                //print_r($search_stats_coupon);

                if(count($search_stats_coupon) == 1)
                {
                    $search_stats_coupon->count_total = $search_stats_coupon->count_total +1;
                    $this->Coupons->SearchStats->save($search_stats_coupon);
                }
                else
                {
                    $search_stats[$x]['coupon_id'] = $coupon->id;
                    $search_stats[$x]['search_keyword'] = strtolower($keyword);
                    $search_stats[$x]['count_total'] = 1;
                
                    $x++;
                }

                $coupon->count_search_total = $coupon->count_search_total +1;
                $this->Coupons->save($coupon);
            }

            if(count($search_stats) > 0)
            {
                $search_stats_table = TableRegistry::get('SearchStats');
                $entities = $search_stats_table->newEntities($search_stats);

                if(!$search_stats_table->saveMany($entities))
                {
                    return false;
                } 
            }  
        }

        return true;
    }
}
