function copyFieldValue() {
    // Get the value of the source field
    var nom = document.getElementById("nom").value;
    var prenom = document.getElementById("prenom").value;
    var cne = document.getElementById("cne").value;
    var appogee = document.getElementById("appogee").value;
    var cin = document.getElementById("cin").value;
    var adresse_parents = document.getElementById("adresse_parents").value;
    var adresse_actuel = document.getElementById("adresse_actuel").value;
    var location = document.getElementById("location").value;
    var cite = document.getElementById("cite").value;
    var adresse_email = document.getElementById("adresse_email").value;
    var telephone = document.getElementById("telephone").value;
    var orphelin = document.getElementById("orphelin").value;
    var nb_membres_famille = document.getElementById("nb_membres_famille").value;
    var abac = document.getElementById("abac").value;
    var etablissement = document.getElementById("etablissement").value;
    var cycle = document.getElementById("cycle").value;

    // Set the value of the target field
    document.getElementById("targetField").value = sourceValue;
}
