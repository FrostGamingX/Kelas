export function getPelanggan() {
    return axios.get('http://localhost:8000/api/pelanggans')
        .then(function (response) {
            const pelanggans = response.data;
            let rows = '';
            pelanggans.forEach(function(pelanggan) {
                rows += `
                    <tr>
                        <td>${pelanggan.idpelanggan}</td>
                        <td>${pelanggan.pelanggan}</td>
                        <td>${pelanggan.alamat}</td>
                        <td>${pelanggan.telp}</td>
                    </tr>
                `;
            });
            document.getElementById('tbody-pelanggan').innerHTML = rows;
        })
        .catch(function (error) {
            alert('Gagal mengambil data pelanggan');
            console.error(error);
        });
}