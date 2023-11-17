
    const del = document.getElementById("delete");

        del.addEventListener('submit', e => {
        e.preventDefault();


            if (!confirm('削除しますか？この操作は取り消し出来ません。')) {
                return;
            }

            e.target.submit();
        });
