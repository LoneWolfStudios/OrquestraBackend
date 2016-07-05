<div ng-controller="VisualizationDetailCtrl">
    <p class="caption">{{ visualization.desc }}</p>
    <div class="divider"></div>
    
    <br>
    
    <div class="flotchart-placeholder" >
        <flot dataset="chartDataset" options="chartOptions" ></flot>
    </div>
    
    <div>
        <div id="chart-legends" style="width: 150px; float: right;"></div>
    </div>
    
</div>
