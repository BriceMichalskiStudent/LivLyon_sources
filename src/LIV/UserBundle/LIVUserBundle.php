<?php

namespace LIV\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class LIVUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
