<?php

function average_kills($person_a, $person_b)
{
    if (
        $person_a['death_age'] < 0 || $person_b['death_age'] < 0 ||
        $person_a['death_year'] <= $person_b['death_year']
    ) {
        return -1;
    }

    $total_kills = 0;
    $num_people = 0;

    for (
        $birth_year = $person_b['death_year'] - $person_b['death_age'];
        $birth_year <= $person_a['death_year'] - $person_a['death_age'];
        $birth_year++
    ) {

        $num_kills = 0;
        for ($i = 1; $i <= $birth_year; $i++) {
            $num_kills += $i;
        }

        $total_kills += $num_kills;
        $num_people++;
    }

    $average_kills = $total_kills / $num_people;

    return $average_kills;
}
// note: Jika Anda memberikan data yang tidak valid (yaitu usia negatif, orang yang lahir sebelum penjahat mengambil alih) program harus mengembalikan -1. Jadi, jika seorang penduduk yang dapat membuat program untuk memecahkan masalah, penjahat itu akan pergi, dan pembunuhan itu akan dihentikan.
$person_a = array('death_age' => 10, 'death_year' => 12);
$person_b = array('death_age' => 13, 'death_year' => 17);
echo average_kills($person_a, $person_b);
