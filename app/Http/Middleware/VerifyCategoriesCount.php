<?php

namespace App\Http\Middleware;
use App\Category;

use Closure;

class VerifyCategoriesCount
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Category::all()->count() === 0)
        {
            session()->flash('error', 'You need to add cateogries to create post');

            return redirect('categoires.create');
        }
        return $next($request);
    }
}
