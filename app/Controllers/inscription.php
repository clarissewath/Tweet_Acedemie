<?php

class Inscription
{
    /**
     * @return void
     */
    public function day(): void
    {
        $start_date = 1;
        $end_date = 31;
        for ($j = $start_date; $j <= $end_date; $j++) {
            echo '<option value=' . $j . '>' . $j . '</option>';
        }
    }

    /**
     * @return void
     */
    public function year(): void
    {
        $year = date('Y');
        $min = $year - 120;
        $max = $year;
        for ($i = $max; $i >= $min; $i--) {
            echo '<option value=' . $i . '>' . $i . '</option>';
        }
    }
}
