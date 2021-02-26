<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Posts admin</h1>
</div>
<div class="row">
    <div class="col-md-12">
        <div>
            <?php f_mostrar_msj(); ?>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>CAT_ID</td>
                    <td>Título</td>
                    <td>Autor</td>
                    <td>Fecha publi</td>
                    <td>IMG</td>
                    <td style="width: 20%">Contenido</td>
                    <td>Tags</td>
                    <td>Vistas</td>
                    <td>Status</td>
                </tr>
            </thead>
            <tbody>
                <?php f_show_posts_admin(); ?>
                <!-- <tr>
                    <td>1</td>
                    <td>1</td>
                    <td>Curso php</td>
                    <td>Jaimito</td>
                    <td>2021-01-01</td>
                    <td>IMG</td>
                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia illo aperiam, dolorum rem necessitatibus alias cupiditate repellat a inventore exercitationem asperiores hic consequuntur adipisci est? Illo nam dignissimos voluptatibus? Quidem.</td>
                    <td>curso, php, nuevo</td>
                    <td>0</td>
                    <td>publicado</td>
                    <td>
                        <a href="#" class="btn btn-primary">editar</a>
                    </td>
                    <td>
                        <a href="#" class="btn btn-danger">borrar</a>
                    </td>
                </tr> -->
            </tbody>
        </table>
    </div>
</div>