<?php

namespace VCComponent\Laravel\Menu\Http\Controllers;

use App\Http\Controllers\Controller;
use Dingo\Api\Routing\Helpers;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use League\Fractal\TransformerAbstract;
use Tymon\JWTAuth\Facades\JWTAuth;

class ApiController extends Controller
{
    use Helpers;
    public function success()
    {
        return $this->response->array(['success' => true]);
    }

    public function simplePaginator(Paginator $paginator, TransformerAbstract $transformer)
    {

        $meta = [
            'pagination' => [
                'per_page'     => $paginator->perPage(),
                'current_page' => $paginator->currentPage(),
            ],
        ];
        return $this->response->collection($paginator->getCollection(), $transformer)->setMeta($meta);
    }

    public function lengthAwarePaginator(LengthAwarePaginator $paginator, TransformerAbstract $transformer)
    {

        $meta = [
            'pagination' => [
                'total'         => $paginator->total(),
                'total_pages'   => ceil($paginator->total() / $paginator->perPage()),
                'per_page'      => $paginator->perPage(),
                'current_page'  => $paginator->currentPage(),
                'last_page'     => $paginator->lastPage(),
                'next_page_url' => $paginator->nextPageUrl(),
                'prev_page_url' => $paginator->previousPageUrl(),
                'from'          => $paginator->firstItem(),
                'to'            => $paginator->lastItem(),
            ],
        ];
        return $this->response->collection($paginator->getCollection(), $transformer)->setMeta($meta);
    }

    public function applySearchFromRequest($query, array $fields, Request $request)
    {
        if ($request->has('search')) {
            $search = $request->get('search');
            if (count($fields)) {
                foreach ($fields as $key => $field) {
                    $query = $query->orWhere($field, 'like', "%{$search}%");
                }
            }
        }
        return $query;
    }

    public function applyOrderByFromRequest($query, Request $request)
    {
        if ($request->has('order_by')) {
            $orderBy = (array) json_decode($request->get('order_by'));
            if (count($orderBy) > 0) {
                foreach ($orderBy as $key => $value) {
                    $query = $query->orderBy($key, $value);
                }
            }
        } else {
            $query = $query->orderBy('id', 'desc');
        }
        return $query;
    }

    public function applyConstraintsFromRequest($query, Request $request)
    {
        if ($request->has('constraints')) {
            $constraints = (array) json_decode($request->get('constraints'));
            if (count($constraints)) {
                $query = $query->where($constraints);
            }
        }
        return $query;
    }

    public function getAuthenticatedUser()
    {
        $user = JWTAuth::parseToken()->authenticate();
        return $user;
    }
}
