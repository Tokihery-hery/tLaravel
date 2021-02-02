<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create </title>
</head>
<style>
    .container {
        margin: auto;
        /* max-width: 1104px; */
        width: max-content;
        height: max-content;
        background: white;
        box-shadow: #000 0 0 2px 0px;
        border-radius: 3px;
    }

    .body {
        display: flex;
        justify-content: center;
        flex-direction: column;
        margin: 67px auto;
    }

    .title,
    .contenu,
    .alert {
        margin: auto;
        position: relative
    }

    .new {
        display: flex;
        justify-content: space-around;
        align-content: flex-start;
    }

    .input-face {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        max-width: 716px;
        margin: 0 14px;
    }

    .input-face form {
        width: max-content;
        padding: 10px;
        margin: 4px 4px;
    }

    input {
        height: 25px;
        margin: 5px auto;
        border: none;
        box-shadow: rgba(0, 0, 0, 0.23) 0 0 2px 0;
    }

    input:focus,
    .btn:focus,
    a:focus,
    button:focus {
        outline: none;
        box-shadow: rgba(0, 23, 45, 0.23) 0 0 7px 0;
        transition: box-shadow .5s;

    }

    .btn:focus,
    a:focus,
    button:focus {
        transform: scale(2);
        color: #fff;
    }

    input:hover,
    .btn:hover,
    button:hover,
    a:hover {
        box-shadow: rgba(134, 43, 25, 0.23) 0 0 7px 1px;
        transition: all .7s;
    }

    .btn:hover,
    button:hover,
    a:hover {
        color: #fff;

    }

    input.form-control {
        width: 300px;
    }

    .action-all {
        display: flex;
        justify-content: space-around;
        align-content: space-between;
    }

    .action {
        display: flex;
        justify-content: flex-end;
        align-content: space-between;
    }

    .form {
        box-shadow: rgba(0, 0, 0, 0.32) 0 0 2px 0px;
        position: relative;
        margin: 4px 8px;
        width: max-content;
    }

    .formModifall {
        display: flex;
        flex-direction: column;
        justify-content: space-around;
        margin: 12px 0;
    }

    form {
        display: block;
    }

    .allform {
        display: flex;
        flex-wrap: wrap;
    }

    .input {
        display: flex;
        flex-direction: column;
        justify-content: space-around;
        align-content: space-around;
        margin: 0 12px;
        text-align: start;
    }

    .btn {
        width: max-content;
        margin: 10px;
        border: none;
    }

    .alert {
        /* margin:12px; */
        height: max-content;
        padding: 0px 34px;
        max-width: 300px;
        text-align: center;
        white-space: wrap;
        line-height: 1;
    }

    .btn-go {
        box-shadow: #10bd3e 0 0 3px 1px;
        background: #56a26a5c;
        border: none;
    }

    .btn-annuler {
        box-shadow: #c10c0cf5 0 0 3px 1px;
        background: #d06262b8;
        border: none;

    }

    .alert-success {
        box-shadow: #10bd3e 0 0 3px 1px;
        background: #56a26a5c;
    }

    .alert-error {
        box-shadow: #c10c0cf5 0 0 3px 1px;
        background: #d06262b8;
    }

    li {
        list-style: none;
    }

    tr {
        box-shadow: rgba(0, 0, 0, 0.32) 0 0 2px 0px;
    }

    td,
    th {
        border-left: 1px solid rgba(0, 0, 0, 0.12);
        padding: 12px;

    }

    .d,
    .tb {
        border: none !important;
    }

    .new {
        display: flex;
        justify-content: space-between;
    }

    a {
        text-decoration: none;
        color: initial;

    }

    .fermer {
        right: 0px;
        position: absolute;
        height: auto;
        width: auto;
        vertical-align: middle;
        background: rgba(13, 56, 35, 0.25);
        padding: 5px;
        cursor: pointer;
        font-weight: bold;
    }

    .fermer:hover {
        color: white;
        background: red;
    }

    .href {
        width: max-content;
        height: max-content;
        margin: auto;
        box-shadow: rgba(0, 0, 0, 0.32) 0 0 1px 0px;
        background: rgba(12, 45, 45, 0.32);
        padding: 12px;
    }

    .connect {
        color: green;
    }

    .noconnect {
        color: red;
        text-decoration-line: line-through;
        opacity: 23%;

    }

    table {
        width: 981px;
    }

    #prevpage,
    #nextpage {
        color: #fff;
        padding: 3px 7px;
        border-radius: 12px;
        transition: all .5s;
        background: green;
    }
</style>

<body>
    <div class="container">
        <div class="header">

        </div>
        @yield('content')
    </div>

    <script>
        let getById = (id) => {
            return document.getElementById(id)
        }
        let queryAll = (el) => {
            return document.querySelectorAll(el)
        }
        let query = (el) => {
            return document.querySelector(el)
        }
        class S {//Session
            static setS = (key, val) => {
                return localStorage.setItem(key, val)
            }
            static getS = (key) => {
                return localStorage.getItem(key)
            }
            static rmS = (key) => {
                return localStorage.removeItem(key)
            }
        }
        let e = queryAll('.e')
        let formList = []
        let formAll = () => {
            let form = document.forms['modif_all']
            let allForm = form.getElementsByClassName('form')
            let name
            let email
            alert("hell")
            for (let j = 0; j < queryAll('input[type=text].form-control').length; j++) {
                if (queryAll('input[type=text].form-control')[j]) name = queryAll('input[type=text].form-control')[j].value
                if (queryAll('input[type=email].form-control')[j]) email = queryAll('input[type=email].form-control')[j].value
                formList.push([allForm[j].getAttribute('id'), name, email])
            }
            if (getById('all_data') != null) console.log(formList)
            getById('all_data').setAttribute('value', formList)
            setTimeout(() => {
                getById('modif_all').submit();
            }, 100);
        }

        let fermer = (a) => {
            let f = a.split('_')[1]
            getById(a).remove()
        }
        select = queryAll('input[type="checkbox"]')
        isa = 0
        isa0 = 0
        c_list = []
        dc_list = []

        for (let i = 0; i < select.length; i++) {
            if (select[i].checked) {
                c_list.push(select[i].name)
                isa++
            } else {
                dc_list.push(select[i].name)
                isa0++
            }
        }
        let max = (...array) => {
            let result = -Infinity
            if (typeof array == 'object') {
                for (const number of array) {
                    if (number > result) result = number
                }
            }
            return result
        }

        let min = (...array) => {
            let result = Infinity
            if (typeof array == 'object') {
                for (const number of array) {
                    if (number < result) result = number
                }
            }
            return result
        }
        let selectIdmax = () => {
            let id = queryAll('td.id')
            let array = []
            for (let i = 0; i < id.length; i++) {
                if (id[i].innerText != "") array.push(parseInt(id[i].innerText))
            }
            localStorage.setItem('max', max(...array))
            if (getById('id_next') != null) getById('id_next').setAttribute('value', max(...array))
        }

        let selectIdmin = () => {
            let p
            let id = queryAll('td.id')
            let array = []
            for (let i = 0; i < id.length; i++) {
                if (id[i].innerText != "") array.push(parseInt(id[i].innerText))
            }
            S.setS('min', min(...array))
            min(...array) == -Infinity ? p = 0 : p = min(...array)

            array.length <= 0 ? p = S.getS('max') : p = min(...array)

            if (getById('id_prev') != null) getById('id_prev').setAttribute('value', p)
        }

        let pageId
        if (S.getS('page') != null) {
            if (S.getS('page') > parseInt(query('#perpages').innerText)) {
                S.setS('page', 1)
                pageId = 1
            } else {
                pageId = S.getS('page')
            }

        } else {
            pageId = 1
            S.setS('page', 1)
        }

        let next = () => {
            pageId = parseInt(pageId) + 1
            S.setS('next', 1)
            S.setS('prev', 0)
            let prevs = S.getS('prev')
            let e = queryAll('.e')
            getById('next').submit()
            localStorage.setItem('listCourant', [grand, petit])

            if (e.length <= 2) {
                getById('prevpage').style.display = "block"
                getById('nextpage').style.display = "none"

            }
            S.setS('page', pageId)

        }
        let prev = () => {
            pageId = parseInt(pageId) * 1 - 1
            S.setS('next', 0)
            S.setS('prev', 1)
            let prevActif = S.getS('next')
            getById('prev').submit()
            S.setS('page', pageId)
            localStorage.setItem('listCourant', [grand, petit])

        }
        if (isa > 1 && e.length != 0) {
            if (getById('modifieall') && getById('modifieall') && getById('disconnectedall')) {
                getById('modifieall').style.display = 'block'
                getById('deleteall').style.display = 'block'
                getById('disconnectedall').style.display = 'block'
            }
        }
        isa == 0 && getById('connectedall') && e.length > 1 && isa0 > 1 || isa != e.length ? getById('connectedall').style.display = 'block' : getById('connectedall').style.display = 'none'
        let getValueForLaravel = (a) => {
            for (let i = 0; i < a.length; i++) {
                console.log(a[i].id)
            }
        }
        let c_all = () => {
            if (getById('c_groupeobject') != null) getById('c_groupeobject').setAttribute('value', c_list)
        }
        let dc_all = () => {
            if (getById('dc_groupeobject') != null) getById('dc_groupeobject').setAttribute('value', dc_list)
        }
        let del_all = () => {
            if (getById('del_groupeobject') != null) getById('del_groupeobject').setAttribute('value', c_list)
        }
        let m_all = () => {
            if (getById('m_groupeobject') != null) getById('m_groupeobject').setAttribute('value', c_list)
        }
        let color = ["red", "green", "blue"]
        let i = 0
        let nextS = S.getS('next') != null ? S.getS('next') : S.setS('next', 0)
        let prevS = S.getS('prev') != null ? S.getS('prev') : S.setS('prev', 0)
        if (petit == minIDs(a)) {
            console.log(`this is petit list courant ${petit} and min for  all list is ${minIDs(a)} `);
            query('.usernavige').setAttribute('class', 'title usernavige alert alert-error')
            getById('nextpage').style.display = "block"
            getById('prevpage').style.display = "none"
            query('.usernavige').querySelector('p').innerText = "End data for prev, click next is disponnible"
            setInterval(() => {
                if (i >= 3) i = 0
                switch (i) {
                    case 0:
                        getById('nextpage').style.transform = "scale(1)"
                        break;
                    case 2:
                        getById('nextpage').style.transform = "scale(1.3)"
                        break;
                    default:
                        break;
                }
                getById('nextpage').style.background = color[i]
                i = i + 1
            }, 1000);

        } else if (grand == maxIDs(a)) {
            getById('nextpage').style.display = "none"
            getById('prevpage').style.display = "block"
            query('.usernavige').setAttribute('class', 'title usernavige alert alert-error')
            query('.usernavige').querySelector('p').innerText = "End data for next, click previous is disponnible"
            setInterval(() => {
                if (i >= 3) i = 0
                switch (i) {
                    case 1:
                        getById('prevpage').style.transform = "scale(1)"
                        break;
                    case 2:
                        getById('prevpage').style.transform = "scale(1.3)"
                        break;
                    default:
                        break;
                }
                getById('prevpage').style.background = color[i]
                i = i + 1
            }, 1000);
        }
        else {
            getById('nextpage').style.display = "block"
            getById('prevpage').style.display = "block"
        }


        if (e.length < 0) {
            query('thead').style.display = "none"
            query('.usernavige').setAttribute('class', 'title usernavige alert alert-error')
            if (nextS == 1) {
                query('.usernavige').querySelector('p').innerText = "End data for next, click previous is disponnible"
            } else if (prevS == 1) {
                query('.usernavige').querySelector('p').innerText = "End data for prev, click next is disponnible"
            }

        } else {

            query('thead').style.display = "contents"
        }

        let list = queryAll('.listCourant')
        for (let i = 0; i < list.length; i++) {
            list[i].setAttribute('value', localStorage.getItem('listCourant'));
        }
        c_all()
        dc_all()
        del_all()
        m_all()
        selectIdmax()
        selectIdmin()
        console.log("this is pagesid " + S.getS("page"));
        query('#page').innerText = S.getS("page")
    </script>
</body>

</html>