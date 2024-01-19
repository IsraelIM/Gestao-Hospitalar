var tbody =  document.getElementById("tbody")
						tbody.innerHTML=""
						var l = document.createElement("tr")
						for (var i = 1; i <= 8; i++) {
							var c = document.createElement("td")
							switch(i){
								case 1:
									c.innerHTML = '.$x->paciente.'
								 break;
								case 2:
									c.innerHTML = '.$x->cirugiao.'
								 break;
								case 3:
									c.innerHTML = '.$x->condicao.'
								 break;
								case 4:c.innerHTML = '.$x->duracao.'break;
								case 5:c.innerHTML = '.$x->estado.'break;
								case 6:c.innerHTML = '.$x->data.'break;
								case 7:c.innerHTML = '.$x->dconsult.'break;
								case 8:c.innerHTML = '.$x->policlinica.'break;
							}
						l.appendChild(c)
						}
					var g = document.getElementById("tbody")
					g.appendChild(l)