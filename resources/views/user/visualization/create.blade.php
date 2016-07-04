<div ng-controller="VisualizationCreateCtrl" class="section">
    <div class="row">
        <div class="col s12 m12 l8 offset-l2">
            <div class="card-panel">
                <h4 class="header2">Dados da Visualização</h4>
                <div class="row">
                    <form class="col s12">
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="name" type="text" ng-model="visualization.name">
                                <label for="name" class="">Apelido</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <textarea id="message" class="materialize-textarea" ng-model="visualization.desc"></textarea>
                                <label for="message" class="" >Descrição</label>
                            </div>
                        </div>


                        <div class="row">
                            <div class="input-field col s12 m12 l4">
                                <select ng-model="visualization.x_id" id="input04" class="browser-default"
                                        ng-options="pin.id as pin.name for pin in ::pins">
                                    <option value=""></option>
                                </select>
                                <label for="input04"  ng-class="{active: visualization.x_id}">x</label>
                            </div>

                            <div class="input-field col s12 m12 l8">
                                <input id="x_label" type="text" ng-model="visualization.x_label">
                                <label for="x_label" class="">Apelido</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12 m12 l4">
                                <select ng-model="visualization.y_id" id="input04" class="browser-default"
                                        ng-options="pin.id as pin.name for pin in ::pins">
                                    <option value=""></option>
                                </select>
                                <label for="input04"  ng-class="{active: visualization.y_id}">y</label>
                            </div>

                            <div class="input-field col s12 m12 l8">
                                <input id="y_label" type="text" ng-model="visualization.y_label">
                                <label for="y_label" class="">Apelido</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12 m12 l4">
                                <select ng-model="visualization.z_id" id="input04" class="browser-default"
                                        ng-options="pin.id as pin.name for pin in ::pins">
                                    <option value=""></option>
                                </select>
                                <label for="input04"  ng-class="{active: visualization.z_id}">z</label>
                            </div>

                            <div class="input-field col s12 m12 l8">
                                <input id="z_label" type="text" ng-model="visualization.z_label">
                                <label for="z_label" class="">Apelido</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <textarea id="message" class="materialize-textarea" ng-model="visualization.formula"></textarea>
                                <label for="message" class="" >Formula (SQL)</label>
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
