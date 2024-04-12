<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if(Auth::check()) {
        $expireTime = Carbon::now()->addSeconds(30);
        Cache::put('user-is-online' . Auth::user()->id, true, $expireTime);
        User::where('id',Auth::user()->id)->update(['last_log' => Carbon::now()]);
        }

        $userRole = $request->user()->role;

        switch ($userRole) {
            case 'user':
                if ($role === 'admin') {
                    return redirect('dashboard');
                } elseif ($role === 'instructor') {
                    return redirect('/instructor/dashboard');
                }
                break;

            case 'admin':
                if ($role === 'user') {
                    return redirect('/admin/dashboard');
                } elseif ($role === 'instructor') {
                    return redirect('/instructor/dashboard');
                }
                break;

            case 'instructor':
                if ($role === 'user') {
                    return redirect('/instructor/dashboard');
                } elseif ($role === 'admin') {
                    return redirect('/admin/dashboard');
                }
                break;

            default:
                // Eğer belirli bir rol tanımlanmış değilse, 403 hatası gönderilebilir
                return abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
