var br = {
    //添加事件
    addEL: function(e, type, fun) {
        if (e.addEventListener) {
            e.addEventListener(type, fun, false);
        } else if (e.attachEvent) {
            e.attachEvent('on' + type, fun);
        } else {
            e['on' + type] = fun;
        }
    },

    //设置输入框值
    setVal: function(e, val) {
        e.value = val;
        br.addEL(e, 'focus', function() {
            if (this.value === val) {
                this.value = '';
            }
        })
        br.addEL(e, 'blur', function() {
            if (this.value === '') {
                this.value = val;
            }
        })
    },

    //快捷键提交表单
    prsKey: function(e) {
        var sub = document.getElementById('submit');

        br.addEL(e, 'keydown', function(event) {
            if ((event.metaKey && event.keyCode == 13) || (event.ctrlKey && event.keyCode == 13)) {
                sub.click();
            }
        })
    }
}

//搜索框提示文字
! function() {
    var sbar = document.getElementsByName('s'),
        len = sbar.length,
        i;

    for (i = 0; i < len; i++) {
        br.setVal(sbar[i], '搜索');
    }
}()

//表单相关
! function() {
    var form = document.getElementById('comment-form');

    if (form) {
        var input = form.getElementsByTagName('input'),
            len = input.length,
            i;

        if (len > 0 && !('placeholder' in input[0])) {
            for (i = 0; i < len; i++) {
                var pla = input[i].getAttribute('placeholder');

                br.setVal(input[i], pla);
            }
        }
        br.prsKey(form);
    }
}()

//切换菜单
! function() {
    var btn = document.getElementById('toggle'),
        nav = document.getElementById('nav'),
        hei = nav.getElementsByTagName('a').length * 51;

    br.addEL(btn, 'click', function() {
        if (btn.className === 'show-btn') {
            btn.className = null;
            nav.style.height = null;
        } else {
            btn.className = 'show-btn';
            nav.style.height = hei + 'px';
        }
    })
}()
