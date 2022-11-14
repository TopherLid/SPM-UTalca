<!DOCTYPE html>
<html lang="en">
<head>
    <title>Upload Form</title>
</head>
<body>


<?= form_open_multipart('archivoprueba') ?>

<!-- enctype="multipart/form-data" -->


<input type="file" name="cv" size="20" />
<input type="file" name="interes" size="20" />
<input type="file" name="antecedentes" size="20" />

<br /><br />

<input type="submit" value="upload" />





</form>

</body>
</html>