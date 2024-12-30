<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Contracts\ProfInterface;

class EnsureUserIsProf
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if ($user instanceof ProfInterface && $user->isProf()) {
            return $next($request);
        }

        return redirect('/');
    }
}
