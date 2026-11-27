-- Données de test pour Pink Data (ids à partir de 101, relançable sans doublons)
USE pink_data;

INSERT IGNORE INTO Professionnel (Id_Praticien, Nom, Prenom, Specialite, Telephone, Email, Login, Mot_de_passe) VALUES
(101, 'Lefevre', 'Isabelle', 'Gynécologue', '065600101', 'isabelle.lefevre@hopital.be', 'lefevre', '$2y$10$7AD8CRSdewRdjc/wmMm/weoY0ilWpZAcFdzz/TLNja63TH5ygwwey'),
(102, 'Bernard', 'Olivier', 'Radiologue', '065600102', 'olivier.bernard@hopital.be', 'bernard', '$2y$10$7AD8CRSdewRdjc/wmMm/weoY0ilWpZAcFdzz/TLNja63TH5ygwwey'),
(103, 'Dumont', 'Camille', 'Oncologue', '065600103', 'camille.dumont@hopital.be', 'dumont', '$2y$10$7AD8CRSdewRdjc/wmMm/weoY0ilWpZAcFdzz/TLNja63TH5ygwwey'),
(104, 'Vincent', 'Hugo', 'Anatomopathologiste', '065600104', 'hugo.vincent@hopital.be', 'vincent', '$2y$10$7AD8CRSdewRdjc/wmMm/weoY0ilWpZAcFdzz/TLNja63TH5ygwwey'),
(105, 'Roussel', 'Elise', 'Chirurgienne', '065600105', 'elise.roussel@hopital.be', 'roussel', '$2y$10$7AD8CRSdewRdjc/wmMm/weoY0ilWpZAcFdzz/TLNja63TH5ygwwey');

INSERT IGNORE INTO Patiente (Id_Patiente, Nom, Prenom, Date_naissance, Numero, Rue, Code_postal, Localite, Telephone, Email) VALUES
(101, 'Claes', 'Sarah', '1971-02-14', '10', 'Rue Test 1', '7000', 'Mons', '0470100000', 'sarah.claes@mail.be'),
(102, 'Peeters', 'Laura', '1965-07-03', '11', 'Rue Test 2', '7037', 'Tournai', '0470100001', 'laura.peeters@mail.be'),
(103, 'Janssens', 'Emma', '1980-11-21', '12', 'Rue Test 3', '7074', 'Ath', '0470100002', 'emma.janssens@mail.be'),
(104, 'Willems', 'Julie', '1958-05-09', '13', 'Rue Test 4', '7111', 'Charleroi', '0470100003', 'julie.willems@mail.be'),
(105, 'Hermans', 'Marie', '1977-09-30', '14', 'Rue Test 5', '7148', 'Mons', '0470100004', 'marie.hermans@mail.be'),
(106, 'Mertens', 'Sophie', '1969-01-18', '15', 'Rue Test 6', '7185', 'La Louvière', '0470100005', 'sophie.mertens@mail.be'),
(107, 'Goossens', 'Nina', '1985-04-25', '16', 'Rue Test 7', '7222', 'Binche', '0470100006', 'nina.goossens@mail.be'),
(108, 'Jacobs', 'Lucie', '1962-12-02', '17', 'Rue Test 8', '7259', 'Soignies', '0470100007', 'lucie.jacobs@mail.be'),
(109, 'Maes', 'Chloé', '1990-06-11', '18', 'Rue Test 9', '7296', 'Mons', '0470100008', 'chloe.maes@mail.be'),
(110, 'Vandenberghe', 'Anaïs', '1974-08-27', '19', 'Rue Test 10', '7333', 'Tournai', '0470100009', 'anais.vandenberghe@mail.be');

INSERT IGNORE INTO Equipement (Id_Equipement, Type_machine, Localisation_salle, Etat_fonctionnement) VALUES
(101, 'Mammographe', 'Salle 1', 'Fonctionnel'),
(102, 'Échographe', 'Salle 2', 'Fonctionnel'),
(103, 'IRM', 'Salle 3', 'En maintenance'),
(104, 'Table de biopsie', 'Salle 4', 'Fonctionnel');

INSERT IGNORE INTO Antecedent_familial (Id_Antecedent_fam, Nom_maladie, Lien_parente, Id_Patiente) VALUES
(101, 'Cancer du sein', 'Mère', 101),
(102, 'Cancer de l''ovaire', 'Tante', 102),
(103, 'Cancer du sein', 'Sœur', 104),
(104, 'Cancer du sein', 'Grand-mère', 106),
(105, 'Cancer du côlon', 'Père', 108);

INSERT IGNORE INTO Antecedent_medical (Id_Antecedent_med, Date_diagnostic, Nom_maladie, Traitements, Id_Patiente) VALUES
(101, '2015-04-10', 'Hypertension', 'Bétabloquants', 101),
(102, '2018-09-02', 'Kyste mammaire', 'Surveillance', 103),
(103, '2010-01-15', 'Diabète type 2', 'Metformine', 104),
(104, '2020-06-20', 'Fibroadénome', 'Exérèse chirurgicale', 107),
(105, '2012-03-05', 'Hypothyroïdie', 'Lévothyroxine', 108);

INSERT IGNORE INTO Consultation (Id_Consultation, Date_consultation, Heure_consultation, Motif_clinique, Symptomes_observes, Conclusions, Id_Patiente, Id_Praticien) VALUES
(101, '2026-08-03', '09:00:00', 'Nodule palpable', 'Symptômes notés 1', 'Conclusion consultation 1', 101, 101),
(102, '2026-08-09', '10:15:00', 'Contrôle annuel', 'Symptômes notés 2', 'Conclusion consultation 2', 102, 103),
(103, '2026-08-15', '11:30:00', 'Douleur mammaire', 'Symptômes notés 3', 'Conclusion consultation 3', 103, 101),
(104, '2026-08-21', '12:45:00', 'Écoulement mamelonnaire', 'Symptômes notés 4', 'Conclusion consultation 4', 104, 103),
(105, '2026-08-27', '13:00:00', 'Suivi post-biopsie', 'Symptômes notés 5', 'Conclusion consultation 5', 105, 105),
(106, '2026-09-02', '14:15:00', 'Anomalie à la mammographie de dépistage', 'Symptômes notés 6', 'Conclusion consultation 6', 106, 101),
(107, '2026-09-08', '15:30:00', 'Résultats d''examens', 'Symptômes notés 7', 'Conclusion consultation 7', 107, 103),
(108, '2026-09-14', '09:45:00', 'Antécédents familiaux', 'Symptômes notés 8', 'Conclusion consultation 8', 108, 101),
(109, '2026-09-20', '10:00:00', 'Nodule palpable', 'Symptômes notés 9', 'Conclusion consultation 9', 109, 103),
(110, '2026-09-26', '11:15:00', 'Contrôle annuel', 'Symptômes notés 10', 'Conclusion consultation 10', 110, 105),
(111, '2026-10-02', '12:30:00', 'Douleur mammaire', 'Symptômes notés 11', 'Conclusion consultation 11', 101, 101),
(112, '2026-10-08', '13:45:00', 'Écoulement mamelonnaire', 'Symptômes notés 12', 'Conclusion consultation 12', 102, 103),
(113, '2026-10-14', '14:00:00', 'Suivi post-biopsie', 'Symptômes notés 13', 'Conclusion consultation 13', 103, 101),
(114, '2026-10-20', '15:15:00', 'Anomalie à la mammographie de dépistage', 'Symptômes notés 14', 'Conclusion consultation 14', 104, 103),
(115, '2026-10-26', '09:30:00', 'Résultats d''examens', 'Symptômes notés 15', 'Conclusion consultation 15', 105, 105),
(116, '2026-11-01', '10:45:00', 'Antécédents familiaux', 'Symptômes notés 16', 'Conclusion consultation 16', 106, 101),
(117, '2026-11-07', '11:00:00', 'Nodule palpable', 'Symptômes notés 17', 'Conclusion consultation 17', 107, 103),
(118, '2026-11-13', '12:15:00', 'Contrôle annuel', 'Symptômes notés 18', 'Conclusion consultation 18', 108, 101);

INSERT IGNORE INTO Prescription (Id_Prescription, Date_prescription, Heure_prescription, Type_prescription, Indication_clinique, Instructions_complementaires, Id_Consultation) VALUES
(101, '2026-08-03', '09:30:00', 'Imagerie', 'Indication clinique 1', 'Aucune', 101),
(102, '2026-08-09', '10:30:00', 'Imagerie', 'Indication clinique 2', 'Aucune', 102),
(103, '2026-08-15', '11:30:00', 'Imagerie', 'Indication clinique 3', 'À jeun', 103),
(104, '2026-08-21', '12:30:00', 'Prélèvement', 'Indication clinique 4', 'Aucune', 104),
(105, '2026-08-27', '13:30:00', 'Imagerie', 'Indication clinique 5', 'Aucune', 105),
(106, '2026-09-02', '14:30:00', 'Imagerie', 'Indication clinique 6', 'Aucune', 106),
(107, '2026-09-08', '15:30:00', 'Imagerie', 'Indication clinique 7', 'À jeun', 107),
(108, '2026-09-14', '09:30:00', 'Prélèvement', 'Indication clinique 8', 'Aucune', 108),
(109, '2026-09-20', '10:30:00', 'Imagerie', 'Indication clinique 9', 'Aucune', 109),
(110, '2026-09-26', '11:30:00', 'Imagerie', 'Indication clinique 10', 'Aucune', 110),
(111, '2026-10-02', '12:30:00', 'Imagerie', 'Indication clinique 11', 'À jeun', 111),
(112, '2026-10-08', '13:30:00', 'Prélèvement', 'Indication clinique 12', 'Aucune', 112),
(113, '2026-10-14', '14:30:00', 'Imagerie', 'Indication clinique 13', 'Aucune', 113),
(114, '2026-10-20', '15:30:00', 'Imagerie', 'Indication clinique 14', 'Aucune', 114);

INSERT IGNORE INTO Demande_examen (Id_Demande, Type_examen_demande, Id_Prescription) VALUES
(101, 'Mammographie', 101),
(102, 'Échographie mammaire', 102),
(103, 'IRM mammaire', 103),
(104, 'Biopsie', 104),
(105, 'Mammographie', 105),
(106, 'Échographie mammaire', 106),
(107, 'IRM mammaire', 107),
(108, 'Biopsie', 108),
(109, 'Mammographie', 109),
(110, 'Échographie mammaire', 110),
(111, 'IRM mammaire', 111),
(112, 'Biopsie', 112),
(113, 'Mammographie', 113),
(114, 'Échographie mammaire', 114);

INSERT IGNORE INTO Examen (Id_Examen, Date_examen, Heure_examen, Id_Demande, Id_Equipement) VALUES
(101, '2026-08-10', '08:00:00', 101, 101),
(102, '2026-08-16', '09:00:00', 102, 102),
(103, '2026-08-22', '10:00:00', 103, 103),
(104, '2026-08-28', '11:00:00', 104, 104),
(105, '2026-09-03', '12:00:00', 105, 101),
(106, '2026-09-09', '13:00:00', 106, 102),
(107, '2026-09-15', '14:00:00', 107, 103),
(108, '2026-09-21', '15:00:00', 108, 104),
(109, '2026-09-27', '08:00:00', 109, 101),
(110, '2026-10-03', '09:00:00', 110, 102),
(111, '2026-10-09', '10:00:00', 111, 103),
(112, '2026-10-15', '11:00:00', 112, 104);

INSERT IGNORE INTO Compte_rendu_radiologique (Id_Compte_rendu, Date_compte_rendu, Localisation_lesions, Classification, Conclusion, Description_images, Id_Examen, Id_Praticien) VALUES
(101, '2026-08-11', 'Quadrant inféro-interne', 'BI-RADS 1', 'Conclusion radiologique 1', 'Description des images 1', 101, 102),
(102, '2026-08-17', 'Quadrant supéro-externe', 'BI-RADS 2', 'Conclusion radiologique 2', 'Description des images 2', 102, 102),
(103, '2026-08-23', 'Quadrant inféro-interne', 'BI-RADS 3', 'Conclusion radiologique 3', 'Description des images 3', 103, 102),
(104, '2026-08-29', 'Quadrant supéro-externe', 'BI-RADS 4', 'Biopsie guidée recommandée', 'Description des images 4', 104, 102),
(105, '2026-09-04', 'Quadrant inféro-interne', 'BI-RADS 5', 'Conclusion radiologique 5', 'Description des images 5', 105, 102),
(106, '2026-09-10', 'Quadrant supéro-externe', 'BI-RADS 2', 'Conclusion radiologique 6', 'Description des images 6', 106, 102),
(107, '2026-09-16', 'Quadrant inféro-interne', 'BI-RADS 1', 'Conclusion radiologique 7', 'Description des images 7', 107, 102),
(108, '2026-09-22', 'Quadrant supéro-externe', 'BI-RADS 4', 'Biopsie guidée recommandée', 'Description des images 8', 108, 102),
(109, '2026-09-28', 'Quadrant inféro-interne', 'BI-RADS 3', 'Conclusion radiologique 9', 'Description des images 9', 109, 102),
(110, '2026-10-04', 'Quadrant supéro-externe', 'BI-RADS 4', 'Conclusion radiologique 10', 'Description des images 10', 110, 102),
(111, '2026-10-10', 'Quadrant inféro-interne', 'BI-RADS 5', 'Conclusion radiologique 11', 'Description des images 11', 111, 102),
(112, '2026-10-16', 'Quadrant supéro-externe', 'BI-RADS 4', 'Biopsie guidée recommandée', 'Description des images 12', 112, 102);

INSERT IGNORE INTO Resultat_anapath (Id_Resultat_anapath, Date_resultat, Type_prelevement, Descriptions, Nature_lesion, Caractere_benin_malin, Conclusions, Id_Examen, Id_Praticien) VALUES
(104, '2026-09-02', 'Biopsie à l''aiguille', 'Prélèvement fixé 4', 'Carcinome canalaire', 'malin', 'Conclusion anatomopathologique 4', 104, 104),
(108, '2026-09-26', 'Biopsie à l''aiguille', 'Prélèvement fixé 8', 'Fibroadénome', 'bénin', 'Conclusion anatomopathologique 8', 108, 104),
(112, '2026-10-20', 'Biopsie à l''aiguille', 'Prélèvement fixé 12', 'Carcinome canalaire', 'malin', 'Conclusion anatomopathologique 12', 112, 104);

INSERT IGNORE INTO Fichier_medical (Id_Fichier, Nom_fichier, Format_fichier, Largeur_pixels, Hauteur_pixels, Taille_octets, Date_creation, Chemin_ou_URL_stockage, Id_Examen) VALUES
(101, 'exam101_1.dcm', 'DICOM', 2048, 1536, 1200100, '2026-08-10', '/images/examens/exam101_1.dcm', 101),
(102, 'exam101_2.dcm', 'DICOM', 2048, 1536, 1200200, '2026-08-10', '/images/examens/exam101_2.dcm', 101),
(103, 'exam102_1.jpg', 'JPEG', 1024, 768, 1205100, '2026-08-16', '/images/examens/exam102_1.jpg', 102),
(104, 'exam102_2.jpg', 'JPEG', 1024, 768, 1205200, '2026-08-16', '/images/examens/exam102_2.jpg', 102),
(105, 'exam103_1.dcm', 'DICOM', 512, 512, 1210100, '2026-08-22', '/images/examens/exam103_1.dcm', 103),
(106, 'exam103_2.dcm', 'DICOM', 512, 512, 1210200, '2026-08-22', '/images/examens/exam103_2.dcm', 103),
(107, 'exam104_1.jpg', 'JPEG', 800, 600, 1215100, '2026-08-28', '/images/examens/exam104_1.jpg', 104),
(108, 'exam104_2.jpg', 'JPEG', 800, 600, 1215200, '2026-08-28', '/images/examens/exam104_2.jpg', 104),
(109, 'exam105_1.dcm', 'DICOM', 2048, 1536, 1220100, '2026-09-03', '/images/examens/exam105_1.dcm', 105),
(110, 'exam105_2.dcm', 'DICOM', 2048, 1536, 1220200, '2026-09-03', '/images/examens/exam105_2.dcm', 105),
(111, 'exam106_1.jpg', 'JPEG', 1024, 768, 1225100, '2026-09-09', '/images/examens/exam106_1.jpg', 106),
(112, 'exam106_2.jpg', 'JPEG', 1024, 768, 1225200, '2026-09-09', '/images/examens/exam106_2.jpg', 106),
(113, 'exam107_1.dcm', 'DICOM', 512, 512, 1230100, '2026-09-15', '/images/examens/exam107_1.dcm', 107),
(114, 'exam107_2.dcm', 'DICOM', 512, 512, 1230200, '2026-09-15', '/images/examens/exam107_2.dcm', 107),
(115, 'exam108_1.jpg', 'JPEG', 800, 600, 1235100, '2026-09-21', '/images/examens/exam108_1.jpg', 108),
(116, 'exam108_2.jpg', 'JPEG', 800, 600, 1235200, '2026-09-21', '/images/examens/exam108_2.jpg', 108),
(117, 'exam109_1.dcm', 'DICOM', 2048, 1536, 1240100, '2026-09-27', '/images/examens/exam109_1.dcm', 109),
(118, 'exam109_2.dcm', 'DICOM', 2048, 1536, 1240200, '2026-09-27', '/images/examens/exam109_2.dcm', 109),
(119, 'exam110_1.jpg', 'JPEG', 1024, 768, 1245100, '2026-10-03', '/images/examens/exam110_1.jpg', 110),
(120, 'exam110_2.jpg', 'JPEG', 1024, 768, 1245200, '2026-10-03', '/images/examens/exam110_2.jpg', 110),
(121, 'exam111_1.dcm', 'DICOM', 512, 512, 1250100, '2026-10-09', '/images/examens/exam111_1.dcm', 111),
(122, 'exam111_2.dcm', 'DICOM', 512, 512, 1250200, '2026-10-09', '/images/examens/exam111_2.dcm', 111),
(123, 'exam112_1.jpg', 'JPEG', 800, 600, 1255100, '2026-10-15', '/images/examens/exam112_1.jpg', 112),
(124, 'exam112_2.jpg', 'JPEG', 800, 600, 1255200, '2026-10-15', '/images/examens/exam112_2.jpg', 112);

INSERT IGNORE INTO Reunion (Id_Reunion, Date_reunion, Heure_reunion) VALUES
(101, '2026-11-05', '14:00:00'),
(102, '2026-11-12', '14:00:00'),
(103, '2026-11-19', '14:00:00'),
(104, '2026-12-03', '14:00:00');

INSERT IGNORE INTO Concerner (Id_Patiente, Id_Reunion, Synthese_decisions, Plan_traitement_propose) VALUES
(104, 101, 'Cas discuté, tumeur confirmée', 'Chirurgie puis chimiothérapie'),
(106, 101, 'Surveillance rapprochée', 'Contrôle dans 3 mois'),
(102, 102, 'Biopsie complémentaire', 'Biopsie sous échographie'),
(108, 103, 'Lésion bénigne', 'Suivi annuel'),
(104, 104, 'Après chirurgie', 'Radiothérapie');

INSERT IGNORE INTO Participer (Id_Reunion, Id_Praticien) VALUES
(101, 101),
(101, 103),
(101, 104),
(102, 102),
(102, 103),
(103, 101),
(103, 104),
(104, 103),
(104, 105);
