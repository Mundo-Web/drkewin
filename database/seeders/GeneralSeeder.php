<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\General;

class GeneralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buscar el registro con ID 1 y actualizarlo, o crearlo si no existe
        General::updateOrCreate(
            ['id' => 1], // Condición de búsqueda
            [
                /*'title1' => 'Explora un Nuevo Horizonte de Salud con el Dr. Kewin',
                'description' => 'Descubre soluciones innovadoras para una vida más saludable con el Dr. Kewin Quispe de la Roca. Somos especialistas en cirugía de vesícula y tratamientos para la obesidad, como el balón gástrico y la banda gástrica. ¡Calcula tu IMC y comienza ahora!',
                'address' => 'Av. Aramburu 1506',
                'inside' => 'Oficina 404 - Piso 4',
                'district' => 'Miraflores',
                'schedule' => "De Lunes a Viernes de 9:00am a 6:00pm y Sábados de 9:00am a 1:00pm",
                'city' => 'Lima',
                'country' => 'Perú',
                'cellphone' => '555-555-123',
                'office_phone' => '5555-1025',
                'email' => 'usuario@mundoweb.pe',
                'facebook' => 'www.facebook.com',
                'instagram' => 'www.instagram.com',
                'youtube' => 'www.youtube.com',
                'twitter' => 'www.twitter.com',
                'linkedin' => 'www.linkedin.com',
                'tiktok' => 'www.tiktok.com',
                'whatsapp' => '555-555-123',
                'form_email' => 'usuario@mundoweb.pe',
                'business_hours' => 'horas',
                'mensaje_whatsapp' => 'Hola estamos atentos a lo que ud desee',
                'title2' => 'https://www.youtube.com/watch?v=J70XgiTEtyg', */
                // Campos SEO
                'meta_title' => 'Dr. Kewin Quispe - Cirugía de Vesícula y Tratamientos para la Obesidad en Lima',
                'meta_description' => 'Especialista en cirugía de vesícula, balón gástrico y banda gástrica. El Dr. Kewin Quispe ofrece tratamientos innovadores para una vida más saludable en Lima, Perú.',
                'meta_keywords' => 'cirugía vesícula, balón gástrico, banda gástrica, obesidad, IMC, Dr. Kewin, Lima, Perú, cirugía laparoscópica',
                'og_title' => 'Dr. Kewin Quispe - Especialista en Cirugía y Tratamientos para la Obesidad',
                'og_description' => 'Descubre tratamientos innovadores con el Dr. Kewin Quispe. Especialista en cirugía de vesícula y obesidad en Lima.',
                'og_image' => '/images/dr-kewin-og-image.jpg',
                'canonical_url' => 'https://drkewin.com',
                'structured_data' => json_encode([
                    '@context' => 'https://schema.org',
                    '@type' => 'MedicalOrganization',
                    'name' => 'Dr. Kewin Quispe de la Roca',
                    'description' => 'Especialista en cirugía de vesícula y tratamientos para la obesidad',
                    'address' => [
                        '@type' => 'PostalAddress',
                        'streetAddress' => 'Av. Aramburu 1506, Oficina 404 - Piso 4',
                        'addressLocality' => 'Miraflores',
                        'addressRegion' => 'Lima',
                        'addressCountry' => 'PE'
                    ],
                    'telephone' => '555-555-123',
                    'email' => 'usuario@mundoweb.pe'
                ])
            ]
        );
    }
}