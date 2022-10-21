let contenu = document.getElementById("contenu");

function suppression()//Supprime le contenu dédié à chaque page
{
    document.getElementById('texte').innerHTML = "" 
}



function blip(nomsection)//fonction attribut dans les balises a 
{
    let gettitre = document.getElementById('titre');
    let getstitre = document.getElementById('soustitre');

    let nombre = 0;
    if(nomsection === "sql")
    {
        gettitre.innerText = `Explication sur l'injection ${nomsection} `;
        nombre = 2;
    } 
    else if(nomsection === "acces") 
    {
        gettitre.innerText = `Explication sur l'${nomsection} indirecte non autorisée`;
        nombre = 3;
    }
    else if(nomsection ==="fix")
    {
        gettitre.innerText = `Explication sur la ${nomsection}ation de session`;
        nombre =5;
    } 
    else if(nomsection === "xss")
    {
        gettitre.innerText = `Explication sur ${nomsection}`;
        nombre = 1
    } 
    else
    {
        gettitre.innerText = `Explication sur ${nomsection}`;
        nombre = 4
    }

    getstitre.innerText = "";

    ajouttexte(nombre);
    
}

function ajouttexte(nombre) //Rajouter une vérif si les id existent
{
    suppression();

    let partie1 = document.createElement("h3");
    let partie2 = document.createElement("h3");
    let partie3 = document.createElement("h3");
    let partie1_contenu = document.createElement("div");
    let partie2_contenu = document.createElement("div");
    let partie3_contenu = document.createElement("div");

    partie1.innerText = "Qu'est ce que c'est ?"; partie1.id = "p1";
    partie2.innerText = "Comment la reproduire ?"; partie1.id = "p2";
    partie3.innerText = "Comment la corriger "; partie1.id = "p3";
    partie1_contenu.id = "p1c";partie2_contenu.id= "p2c";partie3_contenu.id= "p3c";

    partie1.style = "font-weight:bolder;";partie2.style = "font-weight:bolder;";partie3.style = "font-weight:bolder;";
    partie1_contenu.classList.add("w3-justify");
    partie1_contenu.style = "font-size:16px;"
    partie2_contenu.classList.add("w3-justify");
    partie2_contenu.style = "font-size:16px";
    partie3_contenu.classList.add("w3-justify");
    partie3_contenu.style = "font-size:16px";

    if(nombre === 5)    //Fixation de session
    {
        partie1_contenu.innerHTML = "La fixation de session est une faille qui permet d'infiltrer le site web en utilisant les informations présentes dans les cookies. Malgré que les cookies peuvent être utilisé pour authentifié une personne sans lui demander de se reconnecter, si des informations critiques se trouvent dans ces derniers, cela peut laisser une faille à utilisateur mailvellant qui pourra saboter ou mettre en danger le site.";     
       
        partie2_contenu.innerHTML = "Pour reproduite cette faille, il faut utiliser du PHP et la fonction <code>setcookie()</code> qui permet de créer et stocker un cookie dans le navigateur de l'utilisateur. Pour pouvoir consulter un cookie, il faut passer par l'outil de développement en appyusant sur F12 ou CTRL+Maj+I .Ensuite il faut se rendre dans la partie stockage. Dans la page de démonstration, l'on peut trouver 3 cookies: un pour le mail, un autre pour le mot de passe et le pseudo de l'adminstrateur du site. "
       
        partie3_contenu.innerHTML ="Pour résoudre cette faille, il est possible d'utiliser la fonction session_regenerate_id() qui permet de regenérer l'id d'une session de l'utilisateur."

    }
    else if(nombre === 4)    //CSRF
    {
        partie1_contenu.innerHTML = "Le CSRF ,acronyme de cross-site requet forgery,  est une attaque qui consiste à obliger le navigateur Web d'un utilisateur à effectuer des opérations indésirables, sur un site de confiance où l'utilisateur est actuellement authentifié.<br>"
        +"La raison ? Accéder à des données critiques de l'utilisateur. Autrement dit, des données importantes tel que votre identité, votre code de carte bleu, votre mot de passe sur ce site,votre adresse de livraison.<br>Les sites ayant la fonctionnalité 'Rester connecter' sont plus succeptibles d'être victimes à ce genre d'attaque.";
     
        partie2_contenu.innerHTML = "Une manière simple de reproduite cette faille est d'aller sur un site où il est connecté et lorsque l'utilisateur doit faire une information importante. Par exemple, De nombreux sites Web disposent d'une page de type « Mon compte », qui stocke les informations de l'utilisateur. Cette page permet souvent à l'utilisateur de modifier son adresse ou le contenu de son panier. Dans le cas d'une attaque CSRF, l'attaquant peut modifier ces informations. Au niveau du site web, la victime apparaît comme l'auteur de ces modifications. Dans la démonstration, il est possible d'acheter des tickets et se faire débiter une somme correspondante au prix des tickets achetés. "
       
        partie3_contenu.innerHTML ="Une première protection serait de demander à l'utilisateur lorsque l'utitilisateur lorsqu'il fait une action importante, comme par exemple procéder à un paiement, serait de lui demande de se reconnecter via un formulaire ou de valider un captcha."
       
    }
    else if(nombre === 3)//Accès indirecte non autorisé
    {
        partie1_contenu.innerHTML = "Une faille de ce type consiste à accéder à une partie d'un site web sans y avoir accès. Par exemple, sur un site crée à partir de WordPress, un logiciel permettant de créer des sites, l'administrateur du site pourra gérer son site en ayant une adresse bien spéciale: /wp-admin.<br> Admettons que Jean dispose d'un site WordPress à l'adresse suivante: www.fabriquedecookies.com . Pour pouvoir gérer son site, Jean utilise l'URL suivant: www.fabriquedecookies.com/wp-admin . Cet accès n'est pas censée être accessible pour un utilisateur lambda.<br> Cette faille consiste justement à ce que l'utilisateur lambda, qui n'est pas censé avoir accès à cette partie y ait accès."
    
        partie2_contenu.innerHTML = "Pour avoir un aperçu de cette faille, cliquer sur l'onglet demo (ou sur ce <a href='pages/pageacces.html'>lien</a>)et remplacer l'URL pages/pageacces.html par pages/admin/pageacces.html. Pour reproduire cette faille, il faut ne jamais vérifier les droits que possède l'utilisateur.";

        partie3_contenu.innerHTML = "Pour résoudre ce problème, une des solutions est d'utiliser la variable <code>$_SESSION</code> en php. Chaque utilisateur possède des droits. Sur toutes les pages d'un site, il faut vérifier si l'utilisateur possède bien les droits pour y acceder. Un moyen simple pour vérifier cela est de demander à l'utilisateur de se connecter grâce à un formulaire. Si l'utilisateur n'est pas censé accéder à cette page alors il faut le rediriger vers une page ultérieur. Dans la page solution lors du formulaire de reconnection, si l'utilisateur saisie : nathanpro@gmail.com comme mail et  123456789 comme mdp. La page le reconnaitra en tant que d'Admin et accédera à la page."
    }
    else if (nombre === 2)//SQL injection
    {
        partie1_contenu.innerHTML = "Lorsqu'un utilisateur veut se connecter à un site, il doit entrer un identifiant et un mot de passe. Ces informations sont stockés dans une base de données. L'injection SQL consiste à interagir avec cette base de données, généralement par l'intermédiaire de formulaire.<br>Le SQL est le langague utilisé dans les bases de données. Les données saisies par l'utilisateur lors d'un formulaire de connexion sont utilisés pour effectuer une requête vers la base de données du site. En utilisant certains caractères, il est possible d'utiliser cette requête pour en effectuer une ou plusieurs qui peuvent nuire à la base de données.<br> Un cas courant est de détruire la table contenant toutes les identifiants et les mots de passes des utilisateurs"
       
        partie2_contenu.innerHTML = "Pour pouvoir reproduire cette faille, il faut utiliser un formulaire afin de se connecter à une base de données existante et envoyer des informations à cette dernière. La page demo possède un formulaire qui demande à l'utilisateur de renseigner un nom et une valeur. Dans le champ argent,  vous pouvez saisir <code> 0);DELETE from banque; -- )</code>. Explication : 0); Permet de terminer la requête qui s'effectue normalement. Dans le cas de la demo, cela permet de terminer la requête d'insertion. En sql, le ; permet un compilateur de faire la différence entre chaque requête. Ainsi la partie <code>DELETE FROM banque</code> est une autre requête qui a pour but de détruire la table banque qui contient toutes les informations présentes dans le tableau. Enfin <code> -- </code> Permet de mettre en commentaire le reste de la requête qui était censé aboutir. Plus simplement,  dans notre cas cela permet de former la requête <code>Insert into banque (id,nom,argent) values (id,'nom',0);DELETE from banque;</code> au lieu de <code>Insert into banque (id,nom,argent) values (id,'nom',0);DELETE from banque;); </code>"
       
        partie3_contenu.innerHTML = "Les injections sql sont un type d'attaque qui persistent à travers les âges. Une des solutions les plus couramment utilisés est d'utilisés des requêtes préparés. Dans le cas où on utilise du PHP, on peut utiliser un objet PDO. En premier lieu, il faut initaliser notre objet PDO afin qu'il puisse se connecter à la base de données. Une fois celà fait, il faut préparer sa requete. Cette fois-ci la requête sql sera : <code> 'INSERT INTO banque VALUES (?,?,?)'</code>. Les valeurs envoyés par le formulaire seront insérés par la suite et ne poseront pas de problème à la requête sql. Une autre manière de précaution est de vérifier la saisie de l'utilisateur.Pour reprendre l'exmeple de la demo, nous avons deux champs : un premier qui est un string et un second qui est un entier. Si l'on vérifie que le champ 'argent' saisie par l'utilisateur est bel et bien un nombre et non un string. Cela empechera les utilisateurs malveillants de faire une injection sql à la base de données";
    }
    else    //xss
    {
        partie1_contenu.innerHTML = "Les failles XSS (Cross-site scripting) sont très nombreuses et font parties de failles les plus utilisées de nos jours. L'objectif de ces attaques est d'injecter un script malveillant au client de l'utilisateur sans que ce dernier ne s'en rende compte. Ce qui rend ces failles compliqués à corriger provient du fait qu'il est possible d'insérer un script sur un peu près n'importe quel élément html, comme: un formulaire, une image, un texte, l'URL de la page . A titre d'exemple, il est possible de délencher une faille xss juste en utilisant la balise <code><img></code> et l'attribut <code>onerror</code>. "
    
        partie2_contenu.innerHTML = "La faille xss est facilement reproduisible : faire un site html, y inserer une balise <a> et avoir comme attribut href de la balise a: javascript:alert(), et vous aurez une faille xss. Dans la page de démonstration, il y a un formulaire, dans l'un des deux champs saisir : <code> alert() </code> le tout dans une balise script et envoyer le formulaire. Le résultat escompté est d'avoir l'apparition d'une pop-up sur la page. <br> Une seconde manière de procéder est d'utiliser l'attribut <code>onerror</code> dans la balise img. Supprimer l'attribut src de l'image et mettre 'javascript:alert()' dans l'attribut onerreor donnera le même résultat. ";

        partie3_contenu.innerHTML = "Bien qu'il est peu probable de réussir à corriger toutes les failles xss d'un site, il est possible de corriger facilement les plus courantes comme celle réaliséés dans la démo. Echapper les caractères spéciaux comme / ou . est une des solutions. En php il est possible de faire celà avec la fonction <code>addslaches()</code>. Lors de la récupération des informations saisies par l'utilisateur, il suffit d'utiliser cette fonction afin de filtrer ces caractères spéciaux."


    }

    document.getElementById('texte').append(partie1);
    document.getElementById('texte').append(partie1_contenu);
    document.getElementById('texte').append(partie2);
    document.getElementById('texte').append(partie2_contenu);
    document.getElementById('texte').append(partie3);
    document.getElementById('texte').append(partie3_contenu);
}



//PAGE SCRF 

function getnbticket()  //Renvoie le nb de ticket saisie
{
  return document.getElementById('nbticket').value;
}


function modal(nombre)//Affiche l'autre modal (modal de paiement)
{
    document.getElementById('ticketModal').style.display='none';
    let modal = document.getElementById('ticketModalConf');
    modal.style.display='block';
    document.getElementById('msg-conf').innerText = `Your paiement of ${nombre} tickets has been accepted. `
}

function veriflog()
{
     document.getElementById('ModalCo').style.display='block';
}