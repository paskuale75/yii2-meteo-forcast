<?php if ($currently) { ?>
    <article class="box weather">
        <div class="icon bubble black" style="display:none;">
            <div class="spin">
                <img style="display:none;" class="weatherWidgetImage" src="#">
            </div>
        </div>

        <div class="weather-box">
            <p>
                <?php echo $weather->timezone;
                $nameOfDay = date('D', $weather->currently->time);
                ?></p>
            <h1><?php echo $nameOfDay; ?></h1>
            <span><?= $weather->currently->summary ?></span>
            <h2 class="temp"><?= $weather->currently->temperature ?> &deg;<?= ($unit == 'si') ? 'C' : 'F' ?></h2></br>
            <span class="high-low"><?= $weather->currently->temperature ?>&deg;/ <?= $weather->currently->apparentTemperature ?>&deg;</span>
            <p><b>Humidity : </b><?= $weather->currently->humidity ?></p>
            <p><b>Pressure : </b><?= $weather->currently->pressure ?></p>
            <p><b>Wind Speed : </b><?= $weather->currently->windSpeed ?></p>
        </div>
    </article>
<?php } ?>

<?php if ($hourly) { ?>


    <div class="weather-box-hourly">

        <?php echo $weather->timezone;
        $nameOfDay = date('D', $weather->currently->time);
        ?>
        <h1><?php echo $nameOfDay; ?></h1>
        <table style="padding:5px;">
            <?php foreach ($weather->hourly->data as $hourly) { ?>
                <tr>
                    <th>
                        <?= date('m/d', $hourly->time); ?>
                        <?= date('h:i a', $hourly->time); ?>
                    </th>
                    <th><?= $hourly->temperature ?> &deg;<?= ($unit == 'si') ? 'C' : 'F' ?></th>
                    <th><?= $hourly->summary ?></th>
                </tr>
            <?php } ?>
        </table>
    </div>

<?php } ?>

<?php if ($daily) { ?>


    <div class="weather-box-hourly">

        <?php echo $weather->timezone;
        $nameOfDay = date('D', $weather->currently->time);
        ?>
        <h1><?php echo $nameOfDay; ?></h1>
        <h2 class="temp"><?= $weather->currently->temperature ?> &deg;<?= ($unit == 'si') ? 'C' : 'F' ?></h2></br>
        <table style="padding:5px;">
            <?php foreach ($weather->daily->data as $daily) { ?>
                <tr>
                    <th>
                        <?= date('D', $daily->time) ?>
                    </th>
                    <th>
                        <?= date('m/d', $daily->time); ?>
                        <?= date('h:i a', $daily->time); ?>
                    </th>
                    <th><?= $daily->temperatureHigh ?> &deg;<?= ($unit == 'si') ? 'C' : 'F' ?></th>
                    <th><?= $daily->summary ?></th>
                </tr>
            <?php } ?>
        </table>
    </div>

<?php } ?>