<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset(url('css/novo.css'))}}">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset(url('vendor/adminlte/bower_components/select2/dist/css/select2.min.css'))}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <link rel="stylesheet" href="{{asset(url('packages/bootstrap-iconpicker/icon-fonts/font-awesome-4.0.0/css/font-awesome.css'))}}">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
    <script src="{{asset(url('vendor/adminlte/bower_components/select2/dist/js/select2.min.js'))}}"></script>

    <!-- Latest compiled and minified CSS -->

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <title>Sistema de Atendimento digital</title>

    @yield('css')
    <style>
        .topo_um {
            background: #036d1a;
            padding: 10px 0;
            color: #FFF;
        }

        .topo_dois {
            background: #038b21;
            color: #FFF;
            border-radius: 0
        }

        #rodape_dois {
            background-color: #036d1a;
            padding: 20px 0;
            color: #fff
        }

        .banner {
            background: url("{{url('fundo.jpg')}}") no-repeat;
            background-size: cover;
            -webkit-background-size: cover; /*Css safari e chrome*/
            -moz-background-size: cover; /*Css firefox*/
            -ms-background-size: cover; /*Css IE não use mer#^@%#*/
            -o-background-size: cover; /*Css Opera*/
        }
    </style>
    <style>


        .stepwizard-step p {
            margin-top: 10px;
        }

        .stepwizard-row {
            display: table-row;
        }

        .stepwizard {
            display: table;
            width: 100%;
            position: relative;
        }

        .stepwizard-step button[disabled] {
            opacity: 1 !important;
            filter: alpha(opacity=100) !important;
        }

        .stepwizard-row:before {
            top: 14px;
            bottom: 0;
            position: absolute;
            content: " ";
            width: 100%;
            height: 1px;
            background-color: #ccc;
            z-order: 0;

        }

        .stepwizard-step {
            display: table-cell;
            text-align: center;
            position: relative;
        }

        .btn-circle {
            width: 30px;
            height: 30px;
            text-align: center;
            padding: 6px 0;
            font-size: 12px;
            line-height: 1.428571429;
            border-radius: 15px;
        }
    </style>


</head>
<body>
<div class="container-fluid topo_um">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">

                <span class="pull-left hidden-xs"><a href="https://www.amapa.gov.br" target="_blank"><div
                            class="gov"><img src="https://seed.portal.ap.gov.br/img/bandeira.jpg" class="img-responsive"
                                             alt="">GOVERNO DO ESTADO DO AMAPÁ</div></a></span>
                <span class="pull-left visible-xs"><a href="https://www.amapa.gov.br" target="_blank"><div
                            class="gov"><img src="https://seed.portal.ap.gov.br/img/bandeira.jpg" class="img-responsive"
                                             alt=""></div></a></span>

                <span class="pull-right">
                    <img class="brasao" src="https://seed.portal.ap.gov.br/img/brasao_topo.png" alt="">
<select
    onchange="window.open(this.options[this.selectedIndex].value, '_blank');" value="GO"
    id="lunch" class="selectpicker" data-live-search="true" title="Órgãos Governamentais"
    tabindex="-98"><option class="bs-title-option" value="">Órgãos Governamentais</option>
                                                <option value="http://www.sead.ap.gov.br">Administração</option>
                                                <option value="http://ageamapa.ap.gov.br">Agência Amapá</option>
                                                <option value="http://www.afap.ap.gov.br">Agência de Fomento</option>
                                                <option value="http://www.setec.ap.gov.br">Ciência e Tecnologia</option>
                                                <option value="http://www.caesa.ap.gov.br">Companhia de Água</option>
                                                <option value="http://www.cea.ap.gov.br">Companhia Elétrica</option>
                                                <option value="http://www.cge.ap.gov.br">Controladoria Geral</option>
                                                <option value="http://www.cbm.ap.gov.br">Corpo de Bombeiros</option>
                                                <option value="http://www.detran.ap.gov.br">Depto. de Trânsito </option>
                                                <option
                                                    value="http://www.rurap.ap.gov.br">Desenvolvimento Rural</option>
                                                <option value="http://www.diagro.ap.gov.br">Diagro</option>
                                                <option value="http://www.seed.ap.gov.br">Educação</option>
                                                <option
                                                    value="http://www.eap.ap.gov.br">Escola de Administração</option>
                                                <option value="http://www.ief.ap.gov.br">Instituto de Florestas</option>
                                                <option
                                                    value="http://www.hemoap.ap.gov.br">Instituto de Hematologia</option>
                                                <option value="http://www.terrap.ap.gov.br">Instituto de Terras</option>
                                                <option value="http://www.rurap.ap.gov.br">Instituto Rural</option>
                                                <option value="http://www.jucap.ap.gov.br">Junta Comercial</option>
                                                <option value="http://www.juventude.ap.gov.br">Juventude</option>
                                                <option value="http://www.lacen.ap.gov.br">Laboratório Central</option>
                                                <option value="http://www.sema.ap.gov.br">Meio Ambiente</option>
                                                <option value="http://www.sims.ap.gov.br">Mobilização Social</option>
                                                <option value="http://www.ipem.ap.gov.br">Pesos e Medidas</option>
                                                <option value="http://www.seplan.ap.gov.br">Planejamento</option>
                                                <option value="http://www.policiacivil.ap.gov.br">Policia Civil</option>
                                                <option value="http://www.pm.ap.gov.br">Policia Militar</option>
                                                <option value="http://www.politec.ap.gov.br">Politec</option>
                                                <option value="http://www.procon.ap.gov.br">Procon</option>
                                                <option value="http://www.difusora.ap.gov.br">Radio Difusora</option>
                                                <option value="http://www.sefaz.ap.gov.br">Receita</option>
                                                <option
                                                    value="http://www.seab.ap.gov.br">Representação GEA Brasília </option>
                                                <option value="http://www.saude.ap.gov.br">Saúde</option>
                                                <option
                                                    value="http://www.prodap.ap.gov.br">Tecnologia da Informação</option>
                                                <option value="http://www.setrap.ap.gov.br">Transporte</option>
                                                <option value="http://www.setur.ap.gov.br">Turismo</option>
                                                <option value="http://www.ueap.ap.gov.br">Universidade Estadual</option>

                  </select></div>
            </span>
        </div>
    </div>
</div>
</div>
<nav class="navbar topo_dois">
    <div class="container">
        <div class="col-sm-12">
            <div class="navbar-text navbar-right altura">
                <div class="social"><a href="https://www.youtube.com/channel/UCjdH9pwiGxYsSzkyV_eKSeg"><i
                            class="fa fa-youtube-square fa-2x simple-tooltip" title="" aria-hidden="true"></i></a></div>
                <span class="busca">
                <form class="navbar-form" method="post" role="search" action="busca_de_noticias">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Buscar" name="b">
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i
                                    class="glyphicon glyphicon-search"></i></button>
                        </div>
                    </div>
                </form>
                </span>
            </div>

        </div>
    </div>
</nav>
<div class="container-fluid banner">
    <div class="container">
        @include('flash-message')
        <div class="row">
            <div class="col-sm-12">
                <div class="logo"><a href="./"><img src="{{asset(url('logo.png'))}}"
                                                    class="img-responsive" alt="" style="max-height: 150px"></a></div>
                <div class="nome"
                     style="text-shadow: 0px -1px 10px #eeeeee, 0px  1px 10px #eeeeee, -1px  0px 10px #eeeeee, 1px  0px 10px #eeeeee, -1px -1px 10px #eeeeee, -1px  1px 10px #eeeeee, 1px -1px 10px #eeeeee, 1px  1px 10px #eeeeee;">
                    <h1>SEMA </h1></div>
                <div class="nome"
                     style="text-shadow: 0px -1px 5px #eeeeee, 0px  1px 5px #eeeeee, -1px  0px 5px #eeeeee, 1px  0px 5px #eeeeee, -1px -1px 5px #eeeeee, -1px  1px 5px #eeeeee, 1px -1px 5px #eeeeee, 1px  1px 5px #eeeeee;">
                    <h3>SISTEMA DE ATENDIMENTO DIGITAL</h3></div>

            </div>
        </div>
    </div>
</div>
<div class="container-fluid menu">
    <div class="container">
        <div class="row">
            <nav class="navbar navbar-default">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand visible-xs" href="./"><i class="fa fa-home" aria-hidden="true"></i></a>
                </div>

                <div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1" aria-expanded="false"
                     style="height: 1px;">
                    <ul class="nav navbar-nav">

                        <li class="hidden-xs"><a href="{{asset(url('/'))}}">PÁGINA INICIAL</a></li>


                        <!-- INICIO MENU DINAMICO -->
                        <!-- FIM MENU DINAMICO -->


                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>

@yield('content')


<div class="container fortaleza"></div>
<div class="container-fluid" id="rodape_um">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="titulos"><i class="fa fa-child" aria-hidden="true"></i> CIDADÃO</div>
                <ul class="list-unstyled">
                    <li><a href="http://www.caesa.ap.gov.br/areaServ.php" target="_blank">2ª via da Conta de Água</a>
                    </li>
                    <li><a href="http://2viasimplificada.cea.ap.gov.br:8081/" target="_blank">2ª via da Conta de
                            Energia</a></li>
                    <li>
                        <a href="http://www.policiacivil.ap.gov.br/index.php?option=com_ckforms&amp;view=ckforms&amp;id=4&amp;Itemid=100"
                           target="_blank">Boletim de Ocorrência Online</a></li>
                    <li><a href="http://sead.ap.gov.br/lconcursos.php" target="_blank">Concursos</a></li>
                    <li><a href="http://www.detran.ap.gov.br/detranap/veiculo/consulta-de-veiculos/" target="_blank">Consulta
                            de Veículos</a></li>
                    <li><a href="http://www.detran.ap.gov.br/detranap/habilitacao/consulta-habilitacao/"
                           target="_blank">Consultar Habilitação</a></li>
                </ul>
            </div>
            <div class="col-sm-3">
                <div class="titulos"><i class="fa fa-industry" aria-hidden="true"></i> EMPRESAS</div>
                <ul class="list-unstyled">
                    <li>
                        <a href="http://www.hal.siga.ap.gov.br/ap/#/preusuario?uri=http:~2F~2Fwww.efornecedor.siga.ap.gov.br~2Fap~2F%3Fdata%3D1520451041791&amp;produto=efcaz&amp;facebook=false&amp;tipo=EXTERNO"
                           target="_blank">Cadastro de Fornecedores</a></li>
                    <li><a href="http://www.sefaz.ap.gov.br/sate/seg/SEGf_AcessarFuncao.jsp?cdFuncao=DIA_060"
                           target="_blank">Certidão Negativa</a></li>
                    <li><a href="http://www.sefaz.ap.gov.br/sate/seg/SEGf_AcessarFuncao.jsp?cdFuncao=ARR_305"
                           target="_blank">DAR Avulso</a></li>
                    <li><a href="http://www.compras.ap.gov.br/" target="_blank">Licitações do Estado</a></li>
                    <li><a href="http://www.sefaz.ap.gov.br/index.php/nota-fiscal-do-consumidor-eletronica"
                           target="_blank">Nota Fiscal Eletrônica</a></li>
                </ul>
            </div>
            <div class="col-sm-3">
                <div class="titulos"><i class="fa fa-users" aria-hidden="true"></i> SERVIDORES</div>
                <ul class="list-unstyled">
                    <li><a href="http://www.agendadoservidor.ap.gov.br/" target="_blank">Agenda do Servidor</a></li>
                    <li><a href="http://www.competencias.ap.gov.br/" target="_blank">Banco de Conhecimento</a></li>
                    <li><a href="http://www.eap.ap.gov.br/" target="_blank">Catálogo de Cursos</a></li>
                    <li><a href="http://www.consig.ap.gov.br/autenticacao.php" target="_blank">Consignataria On line</a>
                    </li>
                    <li><a href="http://portal.sigrh.ap.gov.br" target="_blank">Contracheque</a></li>
                    <li>
                        <a href="https://sso.gestaodeacesso.planejamento.gov.br/cassso/login?service=https%3A%2F%2Fservidor.sigepe.planejamento.gov.br%2FSIGEPE-PortalServidor%2Fprivate%2Finicio.jsf%3Bjsessionid%3DD2U0u%2BygR3NSocx1foq6L7EL"
                           target="_blank">Serviços do Servidor Federal</a></li>
                </ul>
            </div>
            <div class="col-sm-3">
                <div class="titulos"><i class="fa fa-thumbs-up" aria-hidden="true"></i> REDES SOCIAIS DO GEA</div>
                <ul class="list-unstyled">
                    <li><a href="http://www.facebook.com/governo.ap" target="_blank"><i class="fa fa-facebook"
                                                                                        aria-hidden="true"></i> Facebook</a>
                    </li>
                    <li><a href="https://twitter.com/governodoamapa" target="_blank"><i class="fa fa-twitter"
                                                                                        aria-hidden="true"></i> Twitter</a>
                    </li>
                    <li><a href="https://www.instagram.com/governoamapa/" target="_blank"><i class="fa fa-instagram"
                                                                                             aria-hidden="true"></i>
                            Instagram</a></li>
                    <li><a href="http://www.youtube.com/user/GovernodoAmapa" target="_blank"><i class="fa fa-youtube"
                                                                                                aria-hidden="true"></i>
                            Youtube</a></li>
                    <li><a href="http://www.flickr.com/photos/governoamapa" target="_blank"><i class="fa fa-flickr"
                                                                                               aria-hidden="true"></i>
                            Flickr</a></li>
                    <a href="http://webmail.amapa.gov.br/" target="_blank"><i class="fa fa-envelope"
                                                                              aria-hidden="true"></i> Webmail GOV</a>
                </ul>
            </div>
        </div>

    </div>
</div>
<div class="container-fluid" id="rodape_dois">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="pull-left">
                    <strong>SEMA - Secretaria de Estado de Meio Ambiente</strong><br>
                    Av. Mendonça Furtado nº 53 - CEP: 68900 - 060 - Macapá/AP -
                    <i class="fa fa-phone" aria-hidden="true"></i> (96) 4009-9450 - <i class="fa fa-envelope-o"
                                                                                       aria-hidden="true"></i>
                    <br>
                    Site desenvolvido pela SEMA e hospedado pelo <a href="http://www.prodap.ap.gov.br" target="_blank">PRODAP
                    </a><br>
                    2017 - 2021 Licença Creative Commons 3.0 International
                </div>
                <div class="pull-right hidden-xs">
                    <img src="https://seed.portal.ap.gov.br/img/brasao.png" alt="Amapá">
                </div>
                <div class="visible-xs text-center">
                    <img src="https://seed.portal.ap.gov.br/img/brasao.png" alt="Amapá">
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {

        var navListItems = $('div.setup-panel div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn');

        allWells.hide();

        navListItems.click(function (e) {
            e.preventDefault();
            var $target = $($(this).attr('href')),
                $item = $(this);

            if (!$item.hasClass('disabled')) {
                navListItems.removeClass('btn-primary').addClass('btn-default');
                $item.addClass('btn-primary');
                allWells.hide();
                $target.show();
                $target.find('input:eq(0)').focus();
            }
        });

        allNextBtn.click(function () {
            var curStep = $(this).closest(".setup-content"),
                curStepBtn = curStep.attr("id"),
                nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
                curInputs = curStep.find("input[type='text'],input[type='url']"),
                isValid = true;

            $(".form-group").removeClass("has-error");
            for (var i = 0; i < curInputs.length; i++) {
                if (!curInputs[i].validity.valid) {
                    isValid = false;
                    $(curInputs[i]).closest(".form-group").addClass("has-error");
                }
            }

            if (isValid)
                nextStepWizard.removeAttr('disabled').trigger('click');
        });

        $('div.setup-panel div a.btn-primary').trigger('click');
    });
</script>



<script>


</script>

@yield('js')
</body>
</html>
