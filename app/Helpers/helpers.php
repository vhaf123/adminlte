<?php

    function setOpen($routeName){
        if(request()->routeIs($routeName)){
            return 'menu-open';
        }else{
            return '';
        }
    }

    function setActive($routeName){
        if(request()->routeIs($routeName)){
            return 'active';
        }else{
            return '';
        }
    }