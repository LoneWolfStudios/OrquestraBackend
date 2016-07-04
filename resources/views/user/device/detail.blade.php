<div id="work-collections" class="seaction" ng-controller="DeviceDetailCtrl">
  
  <p class="caption">{{ device.desc }}</p>
  <div class="divider"></div>
    
  <div class="row">
    
    <div class="col s12 m12 l6">
      <ul id="projects-collection" class="collection">
        <li class="collection-item avatar">
          <i class="mdi-action-label circle light-blue"></i>
          <span class="collection-header">Pinos</span>
          <p>Pinos configurados para este dispositivo</p>
          <a ui-sref="pin_create({deviceId: device.id })" title="Novo Pino" class="secondary-content"><i class="mdi-content-add small"></i></a>
        </li>
        <li class="collection-item" ng-repeat="pin in pins">
          <div class="row">
            <div class="col s5">
              <p class="collections-title">{{ pin.name }}</p>
              <p class="collections-content">{{ pin.desc | limitTo:30 }}</p>
            </div>
            <div class="col s3">
              <small class="col s12">Gráfico Tempo Real</small>
            </div>
            <div class="col s4 right-align">
              <a ui-sref="pin_detail({pinId: pin.id, deviceId: device.id})" class="btn-floating waves-effect waves-light green" title="Detalhes">
                <i class="mdi-action-search"></i>
              </a>
              <a class="btn-floating waves-effect waves-light orange" title="Editar">
                <i class="mdi-editor-mode-edit"></i>
              </a>
              <a class="btn-floating waves-effect waves-light red" title="Deletar">
                <i class="mdi-action-delete"></i>
              </a>
            </div>
          </div>
        </li>

        <li class="collection-item" ng-if="pins.length == 0">
            <span>Este dispositivo não possui pinos.</span>
        </li>
        
      </ul>
    </div>
    
    <div class="col s12 m12 l6">
      <ul id="issues-collection" class="collection">
        <li class="collection-item avatar">
          <i class="mdi-editor-insert-chart green circle"></i>
          <span class="collection-header">Visualizações</span>
          <p>As visualizações configuradas para este dispositivo</p>
          <a ui-sref="visualization_create({deviceId: device.id})" class="secondary-content"><i class="mdi-content-add small"></i></a>
        </li>
        
        <li class="collection-item" ng-repeat="visualization in visualizations">
          <div class="row">
            <div class="col s5">
              <p class="collections-title">{{ visualization.name }}</p>
              <p class="collections-content">{{ visualization.desc | limitTo:30 }}</p>
            </div>
            <div class="col s3">
              <small class="col s12">Gráfico Tempo Real</small>
            </div>
            <div class="col s4 right-align">
              <a ui-sref="visualization_detail({visualizationId: visualization.id, deviceId: device.id})" class="btn-floating waves-effect waves-light green" title="Detalhes">
                <i class="mdi-action-search"></i>
              </a>
              <a class="btn-floating waves-effect waves-light orange" title="Editar">
                <i class="mdi-editor-mode-edit"></i>
              </a>
              <a class="btn-floating waves-effect waves-light red" title="Deletar">
                <i class="mdi-action-delete"></i>
              </a>
            </div>
          </div>
        </li>
       
        <li class="collection-item" ng-if="visualizations.length == 0">
            <span>Este dispositivo não possui pinos.</span>
        </li>
        
   </ul>
   </div>
 </div>
 
 <div class="row">
    <div class="col s12 m12 l6">
      <ul id="issues-collection" class="collection">
        <li class="collection-item avatar">
          <i class="mdi-editor-insert-chart red circle"></i>
          <span class="collection-header">Limites</span>
          <p>Os limites configuradas para este dispositivo</p>
          <a href="#" class="secondary-content"><i class="mdi-action-grade"></i></a>
        </li>
        
        <li class="collection-item">
          <div class="row">
            <div class="col s7">
              <p class="collections-title"><strong>#102</strong> Home Page</p>
              <p class="collections-content">Web Project</p>
            </div>
            <div class="col s2">
              <span class="task-cat pink accent-2">P1</span>
            </div>
            <div class="col s3">
              <div class="progress">
               <div class="determinate" style="width: 70%"></div>   
             </div>                                                
           </div>
         </div>
       </li>
       
   </ul>
   </div>
   
   <div class="col s12 m12 l6">
      <ul id="issues-collection" class="collection">
        <li class="collection-item avatar">
          <i class="mdi-editor-insert-chart silver circle"></i>
          <span class="collection-header">Ações</span>
          <p>As ações atutomazidas configuradas para este dispositivo</p>
          <a href="#" class="secondary-content"><i class="mdi-action-grade"></i></a>
        </li>
        
        <li class="collection-item">
          <div class="row">
            <div class="col s7">
              <p class="collections-title"><strong>#102</strong> Home Page</p>
              <p class="collections-content">Web Project</p>
            </div>
            <div class="col s2">
              <span class="task-cat pink accent-2">P1</span>
            </div>
            <div class="col s3">
              <div class="progress">
               <div class="determinate" style="width: 70%"></div>   
             </div>                                                
           </div>
         </div>
       </li>
       
   </ul>
   </div>
   
 </div>
 
</div>
<!-- Floating Action Button -->
