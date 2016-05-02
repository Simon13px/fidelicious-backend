<!DOCTYPE html>
<html>
<head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script><body>
  <div class="container-fluid" style="width:600px">
      <canvas id="BarChart" style="width:50%"></canvas>
  </div>

{!! app()->chartbar->render("BarChart", $data) !!}
