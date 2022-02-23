<?php include 'php/actions/validaSessao.php'; ?>

<script type="text/javascript">
    mudaNavbar('<?php echo $_SESSION['login']; ?>', '<?php echo $_SESSION['role']; ?>');
</script>
