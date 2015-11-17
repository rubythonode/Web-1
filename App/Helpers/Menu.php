<?php namespace app\Helpers;

//use App\Product;
//use App\Order;

class Menu
{
    /**
     * [Menu Dashboard ]
     * @param  boolean para indicar el tipo de salida, json o array
     * @return [json o array]
     * Nota: el contenido del array interno de contener al menos route y text lo demas es opcional
     * //[route,text,cont(para badge), divider, class, icon  ]
     */
    public static function dashboard($returnArray=true)
    {
        $user=\Auth::user();

        $menu = [
           // ['route' =>'/user/address', 'text'=> trans('user.address_book'), 'icon' => 'glyphicon glyphicon-map-marker', 'divider'=>1 ],
        ];
        #esta logueado 
        if($user){
            if ($user->isRoot()) {

                
            }
            if ($user->hasRole(['Administrador', 'Root'])) {

                 $menu[]=['route' =>[
                        ['route' =>'/users/create', 'text'=> trans('user.user_creation') ]
                        ], 'text'=> trans('user.users')];
            }

            if ($user->hasRole(['Support', 'Root'])) {
            }

            if ($user->hasRole(['Client', 'Root'])) {
            }
        }

        return $returnArray ? $menu : json_encode($menu);
    }

    /**
     * [Menu Top ]
     * @param  boolean para indicar el tipo de salida, json o array
     * @return [json o array]
     * Nota: el contenido del array interno de contener al menos route y text lo demas es opcional
     * //[route,text,cont(para badge), divider, class, icon  ]
     * Este menu carga el menu del Dashboard
     */
    public static function top($returnArray=true)
    {
        $menu[]= ['route'=>'/auth/logout', 'text'=> trans('user.logout'), 'icon'=>'glyphicon glyphicon-log-out', 'divider'=>1];
        
        return $returnArray ? $menu : json_encode($menu);
    }


    

     /**
     * [Menu help ]
     * @param  boolean para indicar el tipo de salida, json o array
     * @return [json o array]
     * Nota: el contenido del array interno de contener al menos route y text lo demas es opcional
     * //[route,text,cont(para badge), divider, class, icon  ]
     */
    public static function help($returnArray=true)
    {
        //Menu para empresas
        
            $menu = [
                ['route' =>'#',      'text'=> trans('globals.faq'),   ],
                ['route' =>'/about','text'=> trans('company.about_us'),  ],
                ['route' =>'/refunds','text'=> trans('company.refund_policy'),  ],
                ['route' =>'/privacy', 'text'=> trans('company.privacy_policy'),    ],
                ['route' =>'/terms', 'text'=> trans('company.terms_of_service'), 'divider'=>1 ],
                ['route' =>'/contact', 'text'=> trans('about.contact_us'),  ],
            ];
        

        return $returnArray ? $menu : json_encode($menu);
    }

        /**
     * [active description]
     * @param  string $route [Route to compare ]
     * @param  string $active [class]
     * @return [string]       [description]
     */
    public static function active($route, $active = 'active')
    {
        //dd(parse_url(\Request::url(), PHP_URL_PATH));

        return parse_url(\Request::url(), PHP_URL_PATH) == $route  ? $active : '';
    }
}
