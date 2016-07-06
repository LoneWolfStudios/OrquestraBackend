<div ng-controller="ConstraintCreateCtrl">
    <div class="row">
        <div class="col s12 m12 l6 offset-l3">
            <div class="card-panel">
                <h4 class="header2">Dados do Gatilho</h4>
                <div class="row">
                    <form class="col s12">
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="name" type="text" ng-model="constraint.name">
                                <label for="first_name" class="">ID</label>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="input-field col s12">
                                <textarea id="message" class="materialize-textarea" ng-model="constraint.desc"></textarea>
                                <label for="message" class="" >Descrição</label>
                            </div>
                        </div>
                        
                        
                        <div class="row">
                            <div class="input-field col s12 m12 l12">
                                <select ng-model="constraint.visualization_id" id="input04" class="browser-default"
                                        ng-options="visualization.id as visualization.name for visualization in ::visualizations">
                                    <option value=""></option>
                                </select>
                                <label for="input04"  ng-class="{active: constraint.visualization_id}">Visualização</label>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="input-field col s12 m12 l12">
                                <select ng-model="constraint.type" id="input05" class="browser-default">
                                    <option value="maior">Maior que</option>
                                    <option value="maior iqual">Maior igual a</option>
                                    <option value="menor">Menor</option>
                                    <option value="maior iqual">Menor igual a</option>
                                    <option value="iqual">Igual a</option>
                                </select>
                                <label for="input05"  ng-class="{active: constraint.type}">Tipo de Comparação</label>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="limit" type="number" ng-model="constraint.value">
                                <label for="limit" class="">Limit</label>
                            </div>
                        </div>
                        
                        
                        <div class="row">
                            <div class="input-field col s12">
                                <button class="btn cyan waves-effect waves-light right" type="button" ng-click="create()" name="action">Criar
                                    <i class="mdi-content-send right"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
