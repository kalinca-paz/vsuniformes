<tbody>

<?php foreach($produtos as $produto): ?>

    <tr>

        <td><?= $produto['idProduto']; ?></td>

        <td>
            <?php if(!empty($produto['foto1'])): ?>
                <img src="../uploads/produtos/<?= $produto['foto1']; ?>" width="80">
            <?php endif; ?>
        </td>

        <td><?= $produto['nomeProd']; ?></td>

        <td><?= $produto['categoria']; ?></td>

        <td>
            R$ <?= number_format($produto['preco'], 2, ',', '.'); ?>
        </td>

        <td><?= $produto['estoque']; ?></td>

        <td>

            <a class="btn-editar"
               href="editarProduto.php?idProduto=<?= $produto['idProduto']; ?>">
                Editar
            </a>

            <a class="btn-excluir"
               href="../controller/excluirProduto.php?idProduto=<?= $produto['idProduto']; ?>"
               onclick="return confirm('Deseja realmente excluir este produto?')">
                Excluir
            </a>

        </td>

    </tr>

<?php endforeach; ?>

</tbody>