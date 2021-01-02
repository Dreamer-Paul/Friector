<?php

$sites = file_get_contents("site.json");
$sites = json_decode($sites, true);

?>
<!DOCTYPE html>
<html lang="zh-cmn-hans">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>友链检测器</title>
</head>
<body>
<style>
.text-red{
    color: red;
}
.text-yellow{
    color: #ffc107;
}
.text-green{
    color: green;
}

.grid{
    display: grid;
    grid-gap: 1em;
    grid-template-columns: repeat(4, 1fr);
}
</style>
<main>
    <h1>友链检测器</h1>
    <p>By: Dreamer-Paul</p>
    <p>V0.1 (21.1.3)</p>
    <p>
        <button onclick="begin()">一键检测</button>
    </p>
    <div class="grid">
    <?php foreach($sites as $item): ?>
        <div class="item">
            <h3><?php echo $item["name"] ?></h3>
            <p><a href="<?php echo $item["url"]; ?>" target="_blank"><?php echo $item["url"]; ?></a></p>
            <span></span>
        </div>
    <?php endforeach; ?>
    </div>
</main>
    <script>
        const $$ = res => document.querySelectorAll(res);
        const item = $$(".item");

        function customer(item, set){
            item.querySelector("span").innerHTML = set.html;
            item.classList.add("text-" + set.color);
        }

        function fetcher(id){
            fetch("api.php?id=" + id).then(res => {
                return res.json();
            }).then(res => {
                // 正常请求
                if(res.http_code === 200){
                    customer(item[id], {
                        color: "green",
                        html: "可以访问"
                    })
                }
                // 被拒绝
                else if(res.http_code === 403){
                    customer(item[id], {
                        color: "yellow",
                        html: "访问被拒绝"
                    })
                }
                
                // 存在跳转
                if(res.redirect_url){
                    customer(item[id], {
                        color: "yellow",
                        html: "跳转到了 " + res.redirect_url
                    });
                }

                console.log(res);
            }).catch(res => {
                // 错误
                customer(item[id], {
                    color: "red",
                    html: "访问错误"
                });
            })
        }

        function begin(){
            for(let i = 0; i < item.length; i++){
                fetcher(i);
            }
        }
    </script>
</body>
</html>
