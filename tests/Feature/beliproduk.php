<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class beliproduk extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_mengunjungi_halaman_utama()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    /** test */
    public function test_mengunjungi_halaman_produk()
    {
        $response = $this->get('/produk');

        $response->assertStatus(200);

        $response->assertSee('Beli');
    }
    /** test */
    public function test_pembelian_halaman_chackout()
    {
        $response = $this->post('checkout', [
        'nama_produk' => 'senilukis',
        'qty'         => 1,
        'harga'       => 500000,
        ]):

        $response->assertRedirect(route('success'));

    }
    /** test */
    public function test_pembelian_sukses()
    {
        $this->get('/sukses-page')

        ->assertStatus(200);

        ->assertSee('Pembelian Berhasil');
    }
}
