<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AccountTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    public function setUp() : void
    {
        parent::setUp();

        Artisan::call('migrate', ['-vvv' => true]);
    }

    /**
     * - Se debe poder depositar en una cuenta
     * - Se debe poder retirar en una cuenta
     * - Se debe registrar la fecha de cada transaccion
     * - se debe tener un balance de cada transaccion
     * - Cada cuenta debe tener un codigo unico
     * - Cada cuenta tiene un tipo especifico de uno a muchos
     */
}
