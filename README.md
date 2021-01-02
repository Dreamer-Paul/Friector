# Friector

简易友链检测工具

## 功能

- [x] 检测友链是否可以访问
- [x] 检测是否更换域名（301）
- [ ] 检测自己是否在对方的友链页面下

## 使用

可以使用本项目的 Markdown 转换工具 `md2json.php`，配套 Typecho 友链页面下的链接使用。

```markdown
 - [DIYgod](https://diygod.me) - Write the Code. Change the World.
 - [狱杰](https://yujienb.cn) - 一切推倒重来
 - [静かな森](https://innei.ren) - 致虚极、守静笃
```

只需要创建一个文件，命名为 `text.md`，或者修改下述代码即可。

```php
$file = file_get_contents("text.md");
```

将页面访问后得到的内容粘贴到 `site.json` 下，就可以读取站点列表，并实现检测了！

## 开源协议

本项目采用 `MIT` 开源协议进行授权，转载或分发请注明 [本项目地址](https://github.com/Dreamer-Paul/Friector)。

原创不易！如果喜欢本项目，请 `Star` 它以示对我的支持~

同时欢迎前往 [我的小窝](https://paul.ren/donate) 为我提供赞助，谢谢您！
