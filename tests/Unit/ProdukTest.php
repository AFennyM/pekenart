<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class ProdukTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_route_produk()
    {
        $response = $this->get('produk');

        $response->assertStatus(302);
    }
    public function test_add_new_produk()
    {
        $response = $this->post('insert-produk', [
            'kategori_id' => '1',
            'nama' => 'ini nama',
            'slug' => 'ini slug',
            'deskripsi' => 'ini deskripsi',
        ]);

        $response->assertRedirect('login');
    }
    public function test_database_produk()
    {
        $this->assertDatabaseHas('produk', [
            'nama' => 'Tas Tali Kur'
        ]);
    }
}
