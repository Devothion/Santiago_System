<?php

namespace Database\Seeders;

use App\Models\MetodoPago;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MetodosPagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $metodos = [
            'Efectivo',
            'Depósitos en Cuenta',
            'Transferencia Bancaria',
            'Pago con Yape',
            'Pago con Plin'
        ];

        foreach ($metodos as $metodo) {
            MetodoPago::create([
                'metodo_pago' => $metodo,
                'status' => 1
            ]);
        }
    }
}
