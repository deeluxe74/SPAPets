<!DOCTYPE html>
<html lang="fr">
<head>
    <? include('composants/parameters.php'); ?>
    <link rel="stylesheet" href="css/tarifs.css">
</head>
<body>
    <header>
        <? include('composants/nav-bar.php'); ?>
    </header>
    
    <h1 class="title green"><span>Nos</span> Tarifs</h1>
    
    <div class="divBrown">
    
            <table>
                <tr>
                    <th class="ages">Ages</th>
                    <th class="races" style="border-right: 1.5px solid #55371E">CHIEN</th>
                    <th class="races">CHATS</th>
                </tr>
                <tr>
                    <td class="ages-domaine">Jusqu’à 6 mois</td>
                    <td style="border-right: 1.5px solid #55371E">300€</td>
                    <td>200€</td>
                </tr>
                <tr>
                    <td class="ages-domaine">Jusqu’à 6 ans</td>
                    <td style="border-right: 1.5px solid #55371E">250€</td>
                    <td>180€</td>
                </tr>
                <tr>
                    <td class="ages-domaine">De 7 à 9 ans</td>
                    <td style="border-right: 1.5px solid #55371E">125€</td>
                    <td>90€</td>
                </tr>
                <tr class="saut">
                    <td class="ages-domaine">Plus de 10 ans</td>
                    <td style="border-right: 1.5px solid #55371E">Laisser a votre générosité</td>
                    <td>Laisser a votre générosité</td>
                </tr>
                <tr class="espace"><td style="background-color: #E5E5E5 ;"></td><td style="border-right: 1.5px solid #55371E"></td><td></td></tr>
                
            </table>
    </div>
    <div class="divBrown" style="padding:inherit;">
        <div class="alert alert-info">Pour toute autre espèces merci de directement nous contacter afin d'évalué au mieux le prix !</div>
    </div>
</body>
</html>