<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Comentarios por aprobar</h1>
</div>

<div class="row">
    <div class="col-md-12">
        <div>
            <?php f_mostrar_msj(); ?>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Post ID</th>
                    <th>Autor</th>
                    <th>Email</th>
                    <th>Comentario</th>
                    <th>Fecha</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php f_show_comentarios_back(); ?>
                <!-- <tr>
                    <td>1</td>
                    <td>
                        <a href="../post.php?post_id=1" target="_blank">Curso php</a>
                    </td>
                    <td>Joshi</td>
                    <td>Joshi@gmail.com</td>
                    <td>Este es el comentario de Joshi</td>
                    <td>2021-01-01 15:00:00</td>
                    <td>pendiente</td>
                    <td>
                        <a href="#" class="btn btn-primary">aprobar</a>
                    </td>
                    <td>
                        <a href="#" class="btn btn-danger">borrar</a>
                    </td>
                </tr> -->
            </tbody>
        </table>
        <?php f_comentarios_aprobar(); ?>
    </div>
</div>