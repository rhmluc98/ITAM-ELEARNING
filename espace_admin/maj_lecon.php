<!DOCTYPE HTML>
	<HTML>
		<HEAD>
			<TITLE>Formulaire2</TITLE>
		</HEAD>
		<body bgcolor="234076">
			<h1><center><u>MISE A JOUR D'UNE LECON</u></center></h1>
			<form enctype="multipart/form-data">
				<fieldset style="margin: auto; width:250px;"><table bgcolor="d0d7e3">
					<tr>
						<td>DESCRIPTION DU COURS:</td>
						<td><input type="text"></td>
					</tr>
					<tr>
						<td>CHAPITRE/POINT:</td>
						<td><input type="text"></td>
					<tr>
					<td>SELECTIONNER LE TYPE DU FICHIER:</td>
					<td>
					<select name="choix">
                        <option>PDF</option>
				        <option>VIDEO</option>
                        <option>AUDIO</option>
                    </select>
					</td>
					</tr>
					<tr>
						<td><input type="file"></td>
					</tr>
				</table>
			</form></fieldset>
		</body>
	</HTML>