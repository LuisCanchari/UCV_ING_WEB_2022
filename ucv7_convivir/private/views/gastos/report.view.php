<?php $this->view('includes/reporth') ?>

<header class="clearfix">
  <div id="logo">
    <img src="<?= ROOT ?>/assets/logo.png">
  </div>
  <div id="project">
    <div><span>CONDOMINIO</span> <?= $condominio->name ?></div>
    <div><span>DIRECCION</span> <?= $condominio->city ?> </div>
    <div><span>FECHA</span> <?= date("j  F , Y") ?></div>
  </div>
  <h1>LISTA DE GASTOS</h1>
</header>

<main>
  <table>
    <thead>
      <tr>
        <th class="service">DOCUMENTO</th>
        <th class="service">FECHA</th>
        <th class="desc">DESCRIPCION</th>
        <th class="qty">MONTO</th>
      </tr>
    </thead>
    <tbody>
      <?php if ($gastos) : ?>
        
        
        <?php foreach ($gastos as $key=>$gasto) : ?>
          <tr>
            <td class="service"><?=ucfirst($gasto->type)?> <?=$gasto->number?></td>
            <td class="service"><?=date("d-m-Y",strtotime($gasto->date))?></td>
            <td class="desc"><?=$gasto->description?></td>
            <td class="qty"><?=$gasto->total?></td>
          </tr>

        <?php endforeach ?>
        <tr>
          <td colspan="3">TOTAL GENERAL</td>
          <td class="total"><?=number_format(array_sum((array_column($gastos, 'total'))),2)?></td>
        </tr>
      <?php endif ?>
    </tbody>
  </table>
  <div id="notices">
    <div>NOTA:</div>
    <div class="notice">El listado de gastos para el presente ejercicio</div>
  </div>
</main>

<?php $this->view('includes/reportf') ?>