<?php namespace App\Http\Filters;

use Orchid\CMS\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class CompanyFilter extends Filter
{

    /**
     * @var array
     */
    public $parameters = [];

    /**
     * @var bool
     */
    public $display = false;

    /**
     * @var bool
     */
    public $dashboard = true;

    /**
     * @param Builder $builder
     *
     * @return Builder
     */
    public function run(Builder $builder): Builder
    {
        $company = $this->request->user()->getRoles()->first();
        if($company === null)
        {
            return $builder;
        }
        $users = $company->getUsers();
        $user_ids = [];
        foreach ($users as $key => $user)
        {
            array_push($user_ids, $user->id);
        }

//        dd($builder->whereIn('user_id', $user_ids)->type('boilers')->get()->toArray());
        return $builder->whereIn('user_id', $user_ids);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function display()
    {

    }
}
