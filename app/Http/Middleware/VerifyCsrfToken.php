<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'roleadd',
        'ruleadd',
        'useradd',
        'userroles',
        'rolessetrule',
        'articleadd',
        'addarticle',
        'searchs',
        'file',
        'phonecode',
        'login',
        'show',
        'addnav',
        'ajaxadd',
        'article',
        '/',
        'codePhone',
        'productRead',
        'proRead',
        'loginRegister',
        'indexLogin',
        'uploadPwd',
        'updatephoto',
        'updatephone',
        'updateuser',
        'addressRead',
        'productSelect',
        'register',
        'apiLogin',
        'deleteall',
        'addressSelect',
        'articleList',
        'typeArticle',
        'articleType'
    ];
}
