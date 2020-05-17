<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?= $this->Form->create(null, ['id'=>'form']) ?>  
<?= $this->Form->input('name', ['type'=>'text']) ?>  
<?= $this->Form->submit("送信") ?>
<?= $this->Form->end() ?>  
</body>
</html>