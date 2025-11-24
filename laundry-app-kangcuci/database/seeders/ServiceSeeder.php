<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    public function run()
    {
        // Data dari teks yang Anda kirim sudah saya rapikan
        $services = [
            ['Baju bayi', '2 Hari', 'Minimal 3 KG (Reguler)', 9000, 'KG'],
            ['Bantal', '7 Hari', 'Tanpa minimal order', 25000, 'PCS'],
            ['Bantal kecil', '2 Hari', 'Tanpa minimal order', 20000, 'PCS'],
            ['Bed cover besar', '2 Hari', 'Tanpa minimal order', 35000, 'PCS'],
            ['Bed cover jumbo', '3 Hari', 'Tanpa minimal order', 40000, 'PCS'],
            ['Bed cover kecil', '2 Hari', 'Tanpa minimal order', 30000, 'PCS'],
            ['Boneka besar', '7 Hari', 'Tanpa minimal order', 35000, 'PCS'],
            ['Boneka jumbo', '7 Hari', 'Tanpa minimal order', 80000, 'PCS'],
            ['Boneka kecil', '7 Hari', 'Tanpa minimal order', 10000, 'PCS'],
            ['Boneka mini', '7 Hari', 'Tanpa minimal order', 5000, 'PCS'],
            ['Boneka sedang', '7 Hari', 'Tanpa minimal order', 20000, 'PCS'],
            ['Celana', '1 Hari', 'Tanpa minimal order', 15000, 'PCS'],
            ['Cuci lipat double express', '4 Jam', 'Tanpa minimal order', 10000, 'KG'],
            ['Cuci lipat expres', '1 Hari', 'Minimal 3 KG(Reguler)', 6000, 'KG'],
            ['Cuci setrika double express', '10 Jam', 'Minimal 3 KG(Reguler)', 15000, 'KG'],
            ['Cuci setrika expres', '1 Hari', 'Minimal 3 KG (Reguler)', 7000, 'KG'],
            ['Dress/gamis', '2 Hari', 'Tanpa minimal order', 35000, 'PCS'],
            ['Gendongan bayi', '7 Hari', 'Tanpa minimal order', 15000, 'PCS'],
            ['Gorden besar', '2 Hari', 'Tanpa minimal order', 40000, 'PCS'],
            ['Gorden kecil', '2 Hari', 'Tanpa minimal order', 20000, 'PCS'],
            ['Gorden sedang', '2 Hari', 'Tanpa minimal order', 30000, 'PCS'],
            ['Guling', '7 Hari', 'Tanpa minimal order', 50000, 'PCS'],
            ['Handuk besar tebal', '1 Hari', 'Tanpa minimal order', 10000, 'PCS'],
            ['Jaket expres', '1 Hari', 'Tanpa minimal order', 20000, 'PCS'],
            ['Jas', '1 Hari', 'Tanpa minimal order', 35000, 'PCS'],
            ['Jasa setrika double express', '10 Jam', 'Minimal 3 KG (Reguler)', 10000, 'KG'],
            ['Jasa setrika expres', '1 Hari', 'Minimal 3 KG (Reguler)', 6000, 'KG'],
            ['Karpet biasa', '7 Hari', 'Tanpa minimal order', 11000, 'KG'],
            ['Karpet cendol/surpet/palembang', '7 Hari', 'Tanpa minimal order', 50000, 'PCS'],
            ['Karpet lembut', '2 Hari', 'Tanpa minimal order', 40000, 'PCS'],
            ['Kasur bayi', '7 Hari', 'Tanpa minimal order', 50000, 'PCS'],
            ['Kebaya', '1 Hari', 'Tanpa minimal order', 35000, 'PCS'],
            ['Kemeja', '1 Hari', 'Tanpa minimal order', 15000, 'PCS'],
            ['Keset', '2 Hari', 'Tanpa minimal order', 12000, 'PCS'],
            ['Ngeringin', '6 Jam', 'Tanpa minimal order', 5000, 'KG'],
            ['Parfum 1ltr', '1 Jam', 'Tanpa minimal order', 45000, 'PCS'],
            ['Perlak', '7 Hari', 'Tanpa minimal order', 20000, 'PCS'],
            ['Perlak besar', '7 Hari', 'Tanpa minimal order', 25000, 'PCS'],
            ['Sajadah tebal', '2 Hari', 'Tanpa minimal order', 25000, 'PCS'],
            ['Sarung sofa/mobil', '2 Hari', 'Tanpa minimal order', 35000, 'PCS'],
            ['Selimut kecil', '1 Hari', 'Tanpa minimal order', 15000, 'PCS'],
            ['Selimut sedang', '1 Hari', 'Tanpa minimal order', 20000, 'PCS'],
            ['Selimut tebal', '2 Hari', 'Tanpa minimal order', 35000, 'PCS'],
            ['Sepatu anak', '2 Hari', 'Tanpa minimal order', 20000, 'PCS'],
            ['Sepatu dewasa', '2 Hari', 'Tanpa minimal order', 25000, 'PCS'],
            ['Seprei besar no 1/2 expres', '1 Hari', 'Tanpa minimal order', 15000, 'PCS'],
            ['Seprei kecil expres', '1 Hari', 'Tanpa minimal order', 12000, 'PCS'],
            ['Seprei rumbai', '2 Hari', 'Tanpa minimal order', 20000, 'PCS'],
            ['Seragam 1 stel', '1 Hari', 'Tanpa minimal order', 20000, 'PCS'],
            ['Setrika kemeja', '1 Jam', 'Tanpa minimal order', 10000, 'PCS'],
            ['Setrika seprei besar', '1 Hari', 'Tanpa minimal order', 10000, 'PCS'],
            ['Setrika seprei kecil', '1 Hari', 'Tanpa minimal order', 7000, 'PCS'],
            ['Stroler besar', '7 Hari', 'Tanpa minimal order', 70000, 'PCS'],
            ['Stroler kecil', '7 Hari', 'Tanpa minimal order', 55000, 'PCS'],
            ['Tas besar', '7 Hari', 'Tanpa minimal order', 30000, 'PCS'],
            ['Tas kecil', '7 Hari', 'Tanpa minimal order', 17000, 'PCS'],
            ['Tas sedang', '7 Hari', 'Tanpa minimal order', 25000, 'PCS'],
            ['Tiker', '7 Hari', 'Tanpa minimal order', 50000, 'PCS'],
        ];

        foreach ($services as $s) {
            Service::create([
                'id_user' => 1, // Pastikan ada user ID 1 di db
                'category' => $s[0],
                'duration' => $s[1],
                'min_order' => $s[2],
                'price_per_kg' => $s[3],
                'unit' => $s[4],
            ]);
        }
    }
}
