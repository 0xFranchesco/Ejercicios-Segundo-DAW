
window.addEventListener('load', () => {


    let tablero = document.getElementById("Tablero");

    let board = [];

    //variable para cuando le clickas a una pieza
    let seleccionada = null;

    //array con las piezas para pintarlas, mvoerlas y añadirles logica
    for (a = 0; a < 8; a++) {
        let fila = [];
        for (b = 0; b < 8; b++) {
            fila.push(null);
        }
        board.push(fila);
    }
    console.log(board);

    //piezas
    board[0] = ["torre-negra","caballo-negro","alfil-negro","reina-negra","rey-negro","alfil-negro","caballo-negro","torre-negra"];
    board[1] = ["peon-negro","peon-negro","peon-negro","peon-negro","peon-negro","peon-negro","peon-negro","peon-negro"];
    board[6] = ["peon-blanco","peon-blanco","peon-blanco","peon-blanco","peon-blanco","peon-blanco","peon-blanco","peon-blanco"];
    board[7] = ["torre-blanca","caballo-blanco","alfil-blanco","reina-blanca","rey-blanco","alfil-blanco","caballo-blanco","torre-blanca"];


    //tablero
    for (let a = 0; a < 8; a++) {

        let tr = document.createElement('tr');
        tr.classList.add("tr");
        
        for (let b = 0; b < 8; b++) {
            
            let td = document.createElement('td');
            td.classList.add("td")
            td.id = "cell-a-b";
            
            td.dataset.row = a;
            td.dataset.col = b;

            td.addEventListener("click", (e) => {

                let row = Number(e.target.dataset.row);
                let col = Number(e.target.dataset.col);

                if (board[row][col] === null) {
                    seleccionada = null;
                }else{
                    seleccionada = {
                        row: row,
                        col: col,
                        piece: board[row][col]
                    };
                }

                renderBoard();
 
            });

            if ((a + b) % 2 !== 0) {
                td.classList.add("negra");
            }

            tr.appendChild(td);
            
        }

        tablero.appendChild(tr);

    }


    //funcion para pintar las piezas
    function renderBoard(){

        for (let row = 0; row < 8; row++) {
            for (let col = 0; col < 8; col++) {
                let celda = document.querySelector(
                    `td[data-row="${row}"][data-col="${col}"]`
                );
            
                celda.textContent = "";

                if (board[row][col] !=null) {
                    let pieza = document.createElement('img');
                    pieza.src = `/assets/pieces/` + board[row][col] + ".svg";
                    pieza.classList.add("pieza");
                    celda.appendChild(pieza);
                }
                if (
                    seleccionada !== null &&
                    row === seleccionada.row &&
                    col === seleccionada.col
                ) {
                    celda.classList.add("seleccionada");
                }

            }   
        }
    }



});