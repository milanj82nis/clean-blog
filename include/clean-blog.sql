-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2021 at 05:13 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clean-blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(211) NOT NULL,
  `slug` varchar(211) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Category 1', 'Category-1', '2021-03-28 15:55:32', '2021-03-28 15:55:32'),
(2, 'Category 2', 'Category-2', '2021-03-28 15:55:36', '2021-03-28 15:55:36'),
(3, 'Category 3', 'Category-3', '2021-03-28 15:55:41', '2021-03-28 15:55:41'),
(4, 'Category 5', 'Category-5', '2021-03-28 15:55:45', '2021-03-28 15:55:45'),
(5, 'Category 4', 'Category-4', '2021-03-28 15:55:53', '2021-03-28 15:55:53'),
(6, 'Category 6', 'Category-6', '2021-03-28 15:55:57', '2021-03-28 15:55:57'),
(7, 'Category 7', 'Category-7', '2021-03-28 15:56:03', '2021-03-28 15:56:03'),
(8, 'Category 8', 'Category-8', '2021-03-28 15:56:08', '2021-03-28 15:56:08'),
(9, 'Category 9', 'Category-9', '2021-03-28 15:56:13', '2021-03-28 15:56:13'),
(10, 'Category 10', 'Category-10', '2021-03-28 15:56:17', '2021-03-28 15:56:17');

-- --------------------------------------------------------

--
-- Table structure for table `favourite_posts`
--

CREATE TABLE `favourite_posts` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `from_user` int(11) NOT NULL,
  `to_user` int(11) NOT NULL,
  `message` text NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(211) NOT NULL,
  `slug` varchar(211) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `category_id` int(11) UNSIGNED NOT NULL,
  `tag_id` int(11) UNSIGNED NOT NULL,
  `featured_image` varchar(211) NOT NULL,
  `excerpt` text NOT NULL,
  `content` text NOT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `featured` int(11) NOT NULL DEFAULT 0,
  `soft_deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `user_id`, `category_id`, `tag_id`, `featured_image`, `excerpt`, `content`, `views`, `featured`, `soft_deleted`, `created_at`, `updated_at`) VALUES
(1, 'Quamquam tu hanc copiosiorem etiam soles dicere.', 'Quamquam-tu-hanc-copiosiorem-etiam-soles-dicere-', 1, 1, 5, 'https://travelfree.info/wp-content/uploads/2018/02/croatia-waterfall-in-deep-forest-of-Cr-12755165-900x300.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Equidem e Cn. Quis suae urbis conservatorem Codrum, quis Erechthei filias non maxime laudat? Rationis enim perfectio est virtus; At enim sequor utilitatem. Et quidem saepe quaerimus verbum Latinum par Graeco et quod idem valeat; Non enim ipsa genuit hominem, sed accepit a natura inchoatum.</p>', '<h2>Quamquam tu hanc copiosiorem etiam soles dicere.</h2><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Equidem e Cn. Quis suae urbis conservatorem Codrum, quis Erechthei filias non maxime laudat? Rationis enim perfectio est virtus; At enim sequor utilitatem. Et quidem saepe quaerimus verbum Latinum par Graeco et quod idem valeat; Non enim ipsa genuit hominem, sed accepit a natura inchoatum.</p><blockquote><p>Quasi vero hoc didicisset a Zenone, non dolere, cum doleret! Illud audierat nec tamen didicerat, malum illud non esse, quia turpe non esset, et esse ferendum viro.&nbsp;</p></blockquote><p>Duo Reges: constructio interrete. <i>Eadem fortitudinis ratio reperietur.</i> Habent enim et bene longam et satis litigiosam disputationem. Si enim ad populum me vocas, eum. Tum Triarius: Posthac quidem, inquit, audacius. Ut in geometria, prima si dederis, danda sunt omnia.</p><ul><li>Nisi autem rerum natura perspecta erit, nullo modo poterimus sensuum iudicia defendere.</li><li>Sed tamen est aliquid, quod nobis non liceat, liceat illis.</li><li>Quis istud possit, inquit, negare?</li><li>An ea, quae per vinitorem antea consequebatur, per se ipsa curabit?</li><li>Aliter enim explicari, quod quaeritur, non potest.</li></ul><ol><li>Sed tempus est, si videtur, et recta quidem ad me.</li><li>Indicant pueri, in quibus ut in speculis natura cernitur.</li><li>Semper enim ex eo, quod maximas partes continet latissimeque funditur, tota res appellatur.</li><li>Quod maxime efficit Theophrasti de beata vita liber, in quo multum admodum fortunae datur.</li></ol><p>Quid ergo dubitamus, quin, si non dolere voluptas sit summa,\r\nnon esse in voluptate dolor sit maximus?\r\n\r\nAn dolor longissimus quisque miserrimus, voluptatem non\r\noptabiliorem diuturnitas facit?\r\n</p><p>Aliter autem vobis placet. Nunc ita separantur, ut disiuncta sint, quo nihil potest esse perversius. Sed vos squalidius, illorum vides quam niteat oratio. Restinguet citius, si ardentem acceperit. Itaque mihi non satis videmini considerare quod iter sit naturae quaeque progressio. Quasi ego id curem, quid ille aiat aut neget. An est aliquid per se ipsum flagitiosum, etiamsi nulla comitetur infamia? Verum hoc idem saepe faciamus. Sed quid attinet de rebus tam apertis plura requirere?</p><p>Non semper, inquam;</p><p>Illa sunt similia: hebes acies est cuipiam oculorum, corpore alius senescit;</p><p>Quid enim?</p><p>Hoc est dicere: Non reprehenderem asotos, si non essent asoti.</p><p>Nulla erit controversia.</p><p>Quae sunt igitur communia vobis cum antiquis, iis sic utamur quasi concessis;</p>', 0, 1, 0, '2021-03-28 15:59:57', '2021-03-28 15:59:57'),
(2, 'Quicquid enim a sapientia proficiscitur, id continuo debet', 'Quicquid-enim-a-sapientia-proficiscitur-id-continuo-debet', 1, 1, 5, 'https://travelfree.info/wp-content/uploads/2018/02/croatia-waterfall-in-deep-forest-of-Cr-12755165-900x300.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Qualis ista philosophia est, quae non interitum afferat pravitatis, sed sit contenta mediocritate vitiorum? <i>Videsne quam sit magna dissensio?</i> Duo Reges: constructio interrete. Sed fortuna fortis; <i>Erat enim Polemonis.</i> <i>Tum mihi Piso: Quid ergo?</i> Aut, Pylades cum sis, dices te esse Orestem, ut moriare pro amico? Iam contemni non poteris. Ut alios omittam, hunc appello, quem ille unum secutus est. <a href=\"http://loripsum.net/\">Huius ego nunc auctoritatem sequens idem faciam.</a></p>', '<h2>Quicquid enim a sapientia proficiscitur, id continuo debet expletum esse omnibus suis partibus;</h2><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Qualis ista philosophia est, quae non interitum afferat pravitatis, sed sit contenta mediocritate vitiorum? <i>Videsne quam sit magna dissensio?</i> Duo Reges: constructio interrete. Sed fortuna fortis; <i>Erat enim Polemonis.</i> <i>Tum mihi Piso: Quid ergo?</i> Aut, Pylades cum sis, dices te esse Orestem, ut moriare pro amico? Iam contemni non poteris. Ut alios omittam, hunc appello, quem ille unum secutus est. <a href=\"http://loripsum.net/\">Huius ego nunc auctoritatem sequens idem faciam.</a></p><p><a href=\"http://loripsum.net/\">Praeclare hoc quidem.</a> <strong>Restinguet citius, si ardentem acceperit.</strong> Duae sunt enim res quoque, ne tu verba solum putes. Ut necesse sit omnium rerum, quae natura vigeant, similem esse finem, non eundem. Tu vero, inquam, ducas licet, si sequetur; Quamquam in hac divisione rem ipsam prorsus probo, elegantiam desidero. <strong>Obsecro, inquit, Torquate, haec dicit Epicurus?</strong></p><ul><li>Quid enim dicis omne animal, simul atque sit ortum, applicatum esse ad se diligendum esseque in se conservando occupatum?</li><li>Equidem etiam Epicurum, in physicis quidem, Democriteum puto.</li><li>Certe nihil nisi quod possit ipsum propter se iure laudari.</li><li>Si est nihil nisi corpus, summa erunt illa: valitudo, vacuitas doloris, pulchritudo, cetera.</li><li>Tubulum fuisse, qua illum, cuius is condemnatus est rogatione, P.</li></ul><p>Disserendi artem nullam habuit.</p><p>Ex quo illud efficitur, qui bene cenent omnis libenter cenare, qui libenter, non continuo bene.</p><p>Quid Zeno?</p><p>Aut etiam, ut vestitum, sic sententiam habeas aliam domesticam, aliam forensem, ut in fronte ostentatio sit, intus veritas occultetur?</p><p>Tubulo putas dicere?</p><p>Illum mallem levares, quo optimum atque humanissimum virum, Cn.</p><p>Itaque illa non dico me expetere, sed legere, nec optare,\r\nsed sumere, contraria autem non fugere, sed quasi secernere.\r\n\r\nCum autem progrediens confirmatur animus, agnoscit ille\r\nquidem naturae vim, sed ita, ut progredi possit longius, per\r\nse sit tantum inchoata.\r\n</p><p>Sed quid attinet de rebus tam apertis plura requirere? Quam nemo umquam voluptatem appellavit, appellat; Qui-vere falsone, quaerere mittimus-dicitur oculis se privasse; De quibus cupio scire quid sentias. Potius ergo illa dicantur: turpe esse, viri non esse debilitari dolore, frangi, succumbere. Quorum sine causa fieri nihil putandum est. In qua quid est boni praeter summam voluptatem, et eam sempiternam? Quid, quod homines infima fortuna, nulla spe rerum gerendarum, opifices denique delectantur historia? Facit igitur Lucius noster prudenter, qui audire de summo bono potissimum velit; Quid enim tanto opus est instrumento in optimis artibus comparandis?</p><blockquote><p>Ut iam liceat una comprehensione omnia complecti non dubitantemque dicere omnem naturam esse servatricem sui idque habere propositum quasi finem et extremum, se ut custodiat quam in optimo sui generis statu;&nbsp;</p></blockquote><ol><li>Quae si potest singula consolando levare, universa quo modo sustinebit?</li><li>Tibi hoc incredibile, quod beatissimum.</li><li>Saepe ab Aristotele, a Theophrasto mirabiliter est laudata per se ipsa rerum scientia;</li><li>Ut enim consuetudo loquitur, id solum dicitur honestum, quod est populari fama gloriosum.</li><li>Quo plebiscito decreta a senatu est consuli quaestio Cn.</li><li>Nec vero sum nescius esse utilitatem in historia, non modo voluptatem.</li></ol>', 0, 1, 0, '2021-03-28 16:01:28', '2021-03-28 16:01:28'),
(3, 'Videamus animi partes, quarum est conspectus illustrior', 'Videamus-animi-partes-quarum-est-conspectus-illustrior', 1, 4, 4, 'https://travelfree.info/wp-content/uploads/2018/02/croatia-waterfall-in-deep-forest-of-Cr-12755165-900x300.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Is hoc melior, quam Pyrrho, quod aliquod genus appetendi dedit, deterior quam ceteri, quod penitus a natura recessit. Nihil minus, contraque illa hereditate dives ob eamque rem laetus. Eam tum adesse, cum dolor omnis absit; <strong>Quis enim redargueret?</strong></p>', '<h2>Zenonis est, inquam, hoc Stoici.</h2><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Is hoc melior, quam Pyrrho, quod aliquod genus appetendi dedit, deterior quam ceteri, quod penitus a natura recessit. Nihil minus, contraque illa hereditate dives ob eamque rem laetus. Eam tum adesse, cum dolor omnis absit; <strong>Quis enim redargueret?</strong></p><p><a href=\"http://loripsum.net/\">Sed ad bona praeterita redeamus.</a> Contemnit enim disserendi elegantiam, confuse loquitur. Quamquam ego non quaero, quid tibi a me probatum sit, sed huic Ciceroni nostro, quem discipulum cupio a te abducere. Quid, cum fictas fabulas, e quibus utilitas nulla elici potest, cum voluptate legimus? Sin ea non neglegemus neque tamen ad finem summi boni referemus, non multum ab Erilli levitate aberrabimus. <strong>Nam ista vestra: Si gravis, brevis;</strong> Aliter enim nosmet ipsos nosse non possumus. <a href=\"http://loripsum.net/\">Tum Piso: Quoniam igitur aliquid omnes, quid Lucius noster?</a></p><p>Perge porro;</p><p>Ex quo, id quod omnes expetunt, beate vivendi ratio inveniri et comparari potest.</p><p>Si longus, levis.</p><p>Quod quidem iam fit etiam in Academia.</p><p>Audax negotium, dicerem impudens, nisi hoc institutum postea translatum ad philosophos nostros esset. Quod quoniam in quo sit magna dissensio est, Carneadea nobis adhibenda divisio est, qua noster Antiochus libenter uti solet. <a href=\"http://loripsum.net/\">Contemnit enim disserendi elegantiam, confuse loquitur.</a> Haec non erant eius, qui innumerabilis mundos infinitasque regiones, quarum nulla esset ora, nulla extremitas, mente peragravisset. Traditur, inquit, ab Epicuro ratio neglegendi doloris. At enim, qua in vita est aliquid mali, ea beata esse non potest. <a href=\"http://loripsum.net/\">Bestiarum vero nullum iudicium puto.</a></p><ol><li>Dicet pro me ipsa virtus nec dubitabit isti vestro beato M.</li><li>Qui enim existimabit posse se miserum esse beatus non erit.</li><li>Primum cur ista res digna odio est, nisi quod est turpis?</li><li>Quid, quod homines infima fortuna, nulla spe rerum gerendarum, opifices denique delectantur historia?</li></ol><blockquote><p>Familiares nostros, credo, Sironem dicis et Philodemum, cum optimos viros, tum homines doctissimos.&nbsp;</p></blockquote><ul><li>Contineo me ab exemplis.</li><li>Sed quoniam et advesperascit et mihi ad villam revertendum est, nunc quidem hactenus;</li><li>Quae in controversiam veniunt, de iis, si placet, disseramus.</li></ul><p>Quod enim vituperabile est per se ipsum, id eo ipso vitium\r\nnominatum puto, vel etiam a vitio dictum vituperari.\r\n\r\nEamne rationem igitur sequere, qua tecum ipse et cum tuis\r\nutare, profiteri et in medium proferre non audeas?\r\n</p><h2>;</h2><p>Duo Reges: constructio interrete. Atque his de rebus et splendida est eorum et illustris oratio. <strong>Satis est ad hoc responsum.</strong> Quid, cum volumus nomina eorum, qui quid gesserint, nota nobis esse, parentes, patriam, multa praeterea minime necessaria? Ut id aliis narrare gestiant? Hic quoque suus est de summoque bono dissentiens dici vere Peripateticus non potest. At enim iam dicitis virtutem non posse constitui, si ea, quae extra virtutem sint, ad beate vivendum pertineant. Eam si varietatem diceres, intellegerem, ut etiam non dicente te intellego; Num igitur eum postea censes anxio animo aut sollicito fuisse? <i>Si longus, levis;</i></p>', 0, 1, 0, '2021-03-28 17:07:58', '2021-03-28 17:07:58'),
(4, 'Eadem nunc mea adversum te oratio est', 'Eadem-nunc-mea-adversum-te-oratio-est', 1, 3, 3, 'https://travelfree.info/wp-content/uploads/2018/02/croatia-waterfall-in-deep-forest-of-Cr-12755165-900x300.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quasi vero, inquit, perpetua oratio rhetorum solum, non etiam philosophorum sit. Duo Reges: constructio interrete. Qualem igitur hominem natura inchoavit? Ne vitationem quidem doloris ipsam per se quisquam in rebus expetendis putavit, nisi etiam evitare posset. Isto modo ne improbos quidem, si essent boni viri. <strong>Quamquam haec quidem praeposita recte et reiecta dicere licebit.</strong> Unum nescio, quo modo possit, si luxuriosus sit, finitas cupiditates habere. Ad eas enim res ab Epicuro praecepta dantur. Duo enim genera quae erant, fecit</p>', '<h2>Eadem nunc mea adversum te oratio est.</h2><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quasi vero, inquit, perpetua oratio rhetorum solum, non etiam philosophorum sit. Duo Reges: constructio interrete. Qualem igitur hominem natura inchoavit? Ne vitationem quidem doloris ipsam per se quisquam in rebus expetendis putavit, nisi etiam evitare posset. Isto modo ne improbos quidem, si essent boni viri. <strong>Quamquam haec quidem praeposita recte et reiecta dicere licebit.</strong> Unum nescio, quo modo possit, si luxuriosus sit, finitas cupiditates habere. Ad eas enim res ab Epicuro praecepta dantur. Duo enim genera quae erant, fecit tria.</p><p>Ille incendat?</p><p>Tollitur beneficium, tollitur gratia, quae sunt vincla concordiae.</p><p>Confecta res esset.</p><p>Itaque hic ipse iam pridem est reiectus;</p><p>Quis negat?</p><p><i>[redacted]</i>tilio Rufo, cum is rem ad amicos ita deferret, se esse heredem Q.</p><p>Quid enim?</p><p>At eum nihili facit;</p><p>Haec para/doca illi, nos admirabilia dicamus. Tu autem negas fortem esse quemquam posse, qui dolorem malum putet. Tum Piso: Atqui, Cicero, inquit, ista studia, si ad imitandos summos viros spectant, ingeniosorum sunt; Nos grave certamen belli clademque tenemus, Graecia quam Troiae divino numine vexit, Omniaque e latis rerum vestigia terris. Quo studio cum satiari non possint, omnium ceterarum rerum obliti níhil abiectum, nihil humile cogitant; In voluptate corporis-addam, si vis, animi, dum ea ipsa, ut vultis, sit e corpore-situm est vivere beate. Quos nisi redarguimus, omnis virtus, omne decus, omnis vera laus deserenda est. <i>Cur haec eadem Democritus?</i> Voluptatem cum summum bonum diceret, primum in eo ipso parum vidit, deinde hoc quoque alienum; Miserum hominem! Si dolor summum malum est, dici aliter non potest. Restat locus huic disputationi vel maxime necessarius de amicitia, quam, si voluptas summum sit bonum, affirmatis nullam omnino fore.</p><p>Completur enim et ex eo genere vitae, quod virtute fruitur,\r\net ex iis rebus, quae sunt secundum naturam neque sunt in\r\nnostra potestate.\r\n\r\nCum autem negant ea quicquam ad beatam vitam pertinere,\r\nrursus naturam relinquunt.\r\n</p><h2>Beatus autem esse in maximarum rerum timore nemo potest.</h2><p>Primum enim, si vera sunt ea, quorum recordatione te gaudere dicis, hoc est, si vera sunt tua scripta et inventa, gaudere non potes. <i>Poterat autem inpune;</i> Re mihi non aeque satisfacit, et quidem locis pluribus. <i>Quid autem habent admirationis, cum prope accesseris?</i> Haec non erant eius, qui innumerabilis mundos infinitasque regiones, quarum nulla esset ora, nulla extremitas, mente peragravisset. Aliter enim explicari, quod quaeritur, non potest. <strong>Restinguet citius, si ardentem acceperit.</strong> Et tamen ego a philosopho, si afferat eloquentiam, non asperner, si non habeat, non admodum flagitem. Et quidem saepe quaerimus verbum Latinum par Graeco et quod idem valeat; <a href=\"http://loripsum.net/\">Tubulo putas dicere?</a> Crasso, quem semel ait in vita risisse Lucilius, non contigit, ut ea re minus agelastoj ut ait idem, vocaretur. <i>Honesta oratio, Socratica, Platonis etiam.</i></p><p>At cum tuis cum disseras, multa sunt audienda etiam de obscenis voluptatibus, de quibus ab Epicuro saepissime dicitur. Quis enim redargueret? Fadio Gallo, cuius in testamento scriptum esset se ab eo rogatum ut omnis hereditas ad filiam perveniret. Atque hoc loco similitudines eas, quibus illi uti solent, dissimillimas proferebas. Bene facis, inquit, quod me adiuvas, et istis quidem, quae modo dixisti, utar potius Latinis, in ceteris subvenies, si me haerentem videbis. Tum ille: Tu autem cum ipse tantum librorum habeas, quos hic tandem requiris? Hoc etsi multimodis reprehendi potest, tamen accipio, quod dant. Ergo adhuc, quantum equidem intellego, causa non videtur fuisse mutandi nominis.</p><ul><li>Ut nemo dubitet, eorum omnia officia quo spectare, quid sequi, quid fugere debeant?</li><li>Quod quidem nobis non saepe contingit.</li><li>Nec vero sum nescius esse utilitatem in historia, non modo voluptatem.</li></ul><ol><li>Haec igitur Epicuri non probo, inquam.</li><li>Cum audissem Antiochum, Brute, ut solebam, cum M.</li><li>Potius inflammat, ut coercendi magis quam dedocendi esse videantur.</li></ol><blockquote><p>Completur enim et ex eo genere vitae, quod virtute fruitur, et ex iis rebus, quae sunt secundum naturam neque sunt in nostra potestate.&nbsp;</p></blockquote>', 0, 1, 0, '2021-03-28 17:08:43', '2021-03-28 17:08:43'),
(5, 'Ut non sine causa ex iis memoriae ducta sit disciplina', 'Ut-non-sine-causa-ex-iis-memoriae-ducta-sit-disciplina', 1, 6, 1, 'https://travelfree.info/wp-content/uploads/2018/02/croatia-waterfall-in-deep-forest-of-Cr-12755165-900x300.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quod si ita sit, cur opera philosophiae sit danda nescio. Nihilne te delectat umquam -video, quicum loquar-, te igitur, Torquate, ipsum per se nihil delectat? Nec tamen ullo modo summum pecudis bonum et hominis idem mihi videri potest. Sit enim idem caecus, debilis. <strong>Minime vero, inquit ille, consentit.</strong></p>', '<h2>Nihilne est in his rebus, quod dignum libero aut indignum esse ducamus?</h2><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quod si ita sit, cur opera philosophiae sit danda nescio. Nihilne te delectat umquam -video, quicum loquar-, te igitur, Torquate, ipsum per se nihil delectat? Nec tamen ullo modo summum pecudis bonum et hominis idem mihi videri potest. Sit enim idem caecus, debilis. <strong>Minime vero, inquit ille, consentit.</strong> Semovenda est igitur voluptas, non solum ut recta sequamini, sed etiam ut loqui deceat frugaliter. <a href=\"http://loripsum.net/\">Duo Reges: constructio interrete.</a> Atque etiam ad iustitiam colendam, ad tuendas amicitias et reliquas caritates quid natura valeat haec una cognitio potest tradere. Introduci enim virtus nullo modo potest, nisi omnia, quae leget quaeque reiciet, unam referentur ad summam. <i>Non semper, inquam;</i> Si de re disceptari oportet, nulla mihi tecum, Cato, potest esse dissensio.</p><blockquote><p>Praeclare Laelius, et recte sofñw, illudque vere: O Publi, o gurges, Galloni! es <i>[redacted]</i> miser, inquit.&nbsp;</p></blockquote><ol><li>Sed quoniam et advesperascit et mihi ad villam revertendum est, nunc quidem hactenus;</li><li>Expectoque quid ad id, quod quaerebam, respondeas.</li><li>Pauca mutat vel plura sane;</li><li>Nam aliquando posse recte fieri dicunt nulla expectata nec quaesita voluptate.</li><li>Aliter enim nosmet ipsos nosse non possumus.</li><li>Aliud igitur esse censet gaudere, aliud non dolere.</li></ol><p>Nam neque virtute retinetur ille in vita, nec iis, qui sine virtute sunt, mors est oppetenda. Ab his oratores, ab his imperatores ac rerum publicarum principes extiterunt. Equidem in omnibus istis conclusionibus hoc putarem philosophia nobisque dignum, et maxime, cum summum bonum quaereremus, vitam nostram, consilia, voluntates, non verba corrigi. <i>Sed mehercule pergrata mihi oratio tua.</i> Aufidio, praetorio, erudito homine, oculis capto, saepe audiebam, cum se lucis magis quam utilitatis desiderio moveri diceret. Nec vero intermittunt aut admirationem earum rerum, quae sunt ab antiquis repertae, aut investigationem novarum. Addidisti ad extremum etiam indoctum fuisse. <a href=\"http://loripsum.net/\">Quamquam haec quidem praeposita recte et reiecta dicere licebit.</a> Nam prius a se poterit quisque discedere quam appetitum earum rerum, quae sibi conducant, amittere. Quam vellem, inquit, te ad Stoicos inclinavisses! erat enim, si cuiusquam, certe tuum nihil praeter virtutem in bonis ducere. Rem unam praeclarissimam omnium maximeque laudandam, penitus viderent, quonam gaudio complerentur, cum tantopere eius adumbrata opinione laetentur? Quia voluptatem hanc esse sentiunt omnes, quam sensus accipiens movetur et iucunditate quadam perfunditur.</p><ul><li>Primum in nostrane potestate est, quid meminerimus?</li><li>Certe non potest.</li><li>Negat enim summo bono afferre incrementum diem.</li><li>Quasi vero, inquit, perpetua oratio rhetorum solum, non etiam philosophorum sit.</li><li>Post enim Chrysippum eum non sane est disputatum.</li><li>Quo modo autem optimum, si bonum praeterea nullum est?</li></ul><h2>Ut non sine causa ex iis memoriae ducta sit disciplina.</h2><p>Dicet pro me ipsa virtus nec dubitabit isti vestro beato M. Virtutibus igitur rectissime mihi videris et ad consuetudinem nostrae orationis vitia posuisse contraria. Nec enim, omnes avaritias si aeque avaritias esse dixerimus, sequetur ut etiam aequas esse dicamus. Aufidio, praetorio, erudito homine, oculis capto, saepe audiebam, cum se lucis magis quam utilitatis desiderio moveri diceret. Quem enim ardorem studii censetis fuisse in Archimede, qui dum in pulvere quaedam describit attentius, ne patriam quidem captam esse senserit? Sin te auctoritas commovebat, nobisne omnibus et Platoni ipsi nescio quem illum anteponebas? Quare hoc videndum est, possitne nobis hoc ratio philosophorum dare.</p><p>Quod dicit Epicurus etiam de voluptate, quae minime sint\r\nvoluptates, eas obscurari saepe et obrui.\r\n\r\nSed est forma eius disciplinae, sicut fere ceterarum,\r\ntriplex: una pars est naturae, disserendi altera, vivendi\r\ntertia.\r\n</p><p>Quem si tenueris, non modo meum Ciceronem, sed etiam me ipsum abducas licebit. Satisne ergo pudori consulat, si quis sine teste libidini pareat? Hoc unum Aristo tenuit: praeter vitia atque virtutes negavit rem esse ullam aut fugiendam aut expetendam. <i>[redacted]</i>tilio Rufo, cum is rem ad amicos ita deferret, se esse heredem Q. <strong>Prioris generis est docilitas, memoria;</strong> Quid adiuvas? <i>Itaque contra est, ac dicitis;</i> Cur igitur, inquam, res tam dissimiles eodem nomine appellas? Is ita vivebat, ut nulla tam exquisita posset inveniri voluptas, qua non abundaret. Ex quo intellegitur nec intemperantiam propter se esse fugiendam temperantiamque expetendam, non quia voluptates fugiat, sed quia maiores consequatur. Scio enim esse quosdam, qui quavis lingua philosophari possint; <a href=\"http://loripsum.net/\">Non laboro, inquit, de nomine.</a> Scis enim me quodam tempore Metapontum venisse tecum neque ad hospitem ante devertisse, quam Pythagorae ipsum illum locum, ubi vitam ediderat, sedemque viderim.</p><p>Quis negat?</p><p>Vitae autem degendae ratio maxime quidem illis placuit quieta.</p><p>Nihil sane.</p><p>Omnia contraria, quos etiam insanos esse vultis.</p>', 0, 1, 0, '2021-03-28 17:09:19', '2021-03-28 17:09:19'),
(6, 'Sraditur, inquit, ab Epicuro ratio neglegendi doloris.', 'Sraditur-inquit-ab-Epicuro-ratio-neglegendi-doloris-', 1, 3, 7, 'https://travelfree.info/wp-content/uploads/2018/02/croatia-waterfall-in-deep-forest-of-Cr-12755165-900x300.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliter enim explicari, quod quaeritur, non potest. Sin aliud quid voles, postea. Tecum optime, deinde etiam cum mediocri amico. <strong>Tum Torquatus: Prorsus, inquit, assentior;</strong></p>', '<h2>Sed virtutem ipsam inchoavit, nihil amplius.</h2><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliter enim explicari, quod quaeritur, non potest. Sin aliud quid voles, postea. Tecum optime, deinde etiam cum mediocri amico. <strong>Tum Torquatus: Prorsus, inquit, assentior;</strong></p><ol><li>A primo, ut opinor, animantium ortu petitur origo summi boni.</li><li>Itaque rursus eadem ratione, qua sum paulo ante usus, haerebitis.</li><li>Primum cur ista res digna odio est, nisi quod est turpis?</li><li>Aliter enim nosmet ipsos nosse non possumus.</li><li>Quid enim de amicitia statueris utilitatis causa expetenda vides.</li></ol><blockquote><p>Respondebo me non quaerere, inquam, hoc tempore quid virtus efficere possit, sed quid constanter dicatur, quid ipsum a se dissentiat.&nbsp;</p></blockquote><p>Ut pompa, ludis atque eius modi spectaculis teneantur ob\r\neamque rem vel famem et sitim perferant?\r\n\r\nNeque solum ea communia, verum etiam paria esse dixerunt.\r\n</p><p>Praeteritis, inquit, gaudeo.</p><p>Hoc est dicere: Non reprehenderem asotos, si non essent asoti.</p><p>Ita credo.</p><p>Vives, inquit Aristo, magnifice atque praeclare, quod erit cumque visum ages, numquam angere, numquam cupies, numquam timebis.</p><p>Confecta res esset.</p><p>Atque haec coniunctio confusioque virtutum tamen a philosophis ratione quadam distinguitur.</p><p>Stoicos roga.</p><p>Haec et tu ita posuisti, et verba vestra sunt.</p><h2>Efficiens dici potest.</h2><p>Sed nimis multa. Duo Reges: constructio interrete. Itaque his sapiens semper vacabit. Hic nihil fuit, quod quaereremus.</p><h3>Traditur, inquit, ab Epicuro ratio neglegendi doloris.</h3><p>Perge porro; Hanc quoque iucunditatem, si vis, transfer in animum; <strong>De ingenio eius in his disputationibus, non de moribus quaeritur.</strong> Quae cum dixisset paulumque institisset, Quid est? Sit sane ista voluptas.</p><p>Quid igitur, inquit, eos responsuros putas? Non potes, nisi retexueris illa. Quae contraria sunt his, malane? Quia dolori non voluptas contraria est, sed doloris privatio. <a href=\"http://loripsum.net/\">Quorum altera prosunt, nocent altera.</a> Sed residamus, inquit, si placet.</p><ul><li>Nam, ut sint illa vendibiliora, haec uberiora certe sunt.</li><li>Iam id ipsum absurdum, maximum malum neglegi.</li></ul><p>Illum mallem levares, quo optimum atque humanissimum virum, Cn. Putabam equidem satis, inquit, me dixisse. Simus igitur contenti his. Istic sum, inquit. <a href=\"http://loripsum.net/\">Nos vero, inquit ille;</a> <a href=\"http://loripsum.net/\">Tum Piso: Quoniam igitur aliquid omnes, quid Lucius noster?</a> <i>Hoc ipsum elegantius poni meliusque potuit.</i> Huius ego nunc auctoritatem sequens idem faciam.</p>', 0, 1, 0, '2021-03-28 17:10:05', '2021-03-28 17:10:05'),
(7, 'Mihi, inquam, qui te id ipsum rogavi?', 'Mihi-inquam-qui-te-id-ipsum-rogavi-', 1, 10, 8, 'https://travelfree.info/wp-content/uploads/2018/02/croatia-waterfall-in-deep-forest-of-Cr-12755165-900x300.jpg', '<h2>&nbsp;</h2><p>Maximas vero virtutes iacere omnis necesse est voluptate dominante. <a href=\"http://loripsum.net/\">Sed haec omittamus;</a> Quae cum essent dicta, discessimus. Eaedem res maneant alio modo. Ergo, inquit, tibi Q. Quae cum dixisset paulumque institisset, Quid est?</p>', '<h2>Et ille ridens: Video, inquit, quid agas;</h2><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. <a href=\"http://loripsum.net/\">Hic nihil fuit, quod quaereremus.</a> <a href=\"http://loripsum.net/\">Verum hoc idem saepe faciamus.</a> <strong>Duo Reges: constructio interrete.</strong> Quid de Platone aut de Democrito loquar? Sed nimis multa. Confecta res esset. Nulla erit controversia. Mihi enim satis est, ipsis non satis.</p><blockquote><p>Constituto autem illo, de quo ante diximus, quod honestum esset, id esse solum bonum, intellegi necesse est pluris id, quod honestum sit, aestimandum esse quam illa media, quae ex eo comparentur.&nbsp;</p></blockquote><ul><li>Parvi enim primo ortu sic iacent, tamquam omnino sine animo sint.</li><li>Sed vos squalidius, illorum vides quam niteat oratio.</li><li>Videmusne ut pueri ne verberibus quidem a contemplandis rebus perquirendisque deterreantur?</li><li>Ergo ita: non posse honeste vivi, nisi honeste vivatur?</li></ul><p>Quid est enim aliud esse versutum? Dat enim intervalla et relaxat. <a href=\"http://loripsum.net/\">Ita relinquet duas, de quibus etiam atque etiam consideret.</a> Erit enim mecum, si tecum erit. Egone quaeris, inquit, quid sentiam? Dici enim nihil potest verius.</p><p>Iubet igitur nos Pythius Apollo noscere nosmet ipsos. Prodest, inquit, mihi eo esse animo. <strong>Egone quaeris, inquit, quid sentiam?</strong> Huius, Lyco, oratione locuples, rebus ipsis ielunior. Quo plebiscito decreta a senatu est consuli quaestio Cn. Proclivi currit oratio.</p><h2>Mihi, inquam, qui te id ipsum rogavi?</h2><p>Maximas vero virtutes iacere omnis necesse est voluptate dominante. <a href=\"http://loripsum.net/\">Sed haec omittamus;</a> Quae cum essent dicta, discessimus. Eaedem res maneant alio modo. Ergo, inquit, tibi Q. Quae cum dixisset paulumque institisset, Quid est?</p><ol><li>Si enim ad populum me vocas, eum.</li><li>Illa argumenta propria videamus, cur omnia sint paria peccata.</li><li>Igitur neque stultorum quisquam beatus neque sapientium non beatus.</li><li>Quae autem natura suae primae institutionis oblita est?</li></ol><p>Stoici scilicet.</p><p>Perge porro;</p><p>Optime, inquam.</p><p>Virtutibus igitur rectissime mihi videris et ad consuetudinem nostrae orationis vitia posuisse contraria.</p><p>Nihilo magis.</p><p>Nec vero pietas adversus deos nec quanta iis gratia debeatur sine explicatione naturae intellegi potest.</p><p>Ita prorsus, inquam;</p><p>Eiuro, inquit adridens, iniquum, hac quidem de re;</p><p>Nec enim absolvi beata vita sapientis neque ad exitum\r\nperduci poterit, si prima quaeque bene ab eo consulta atque\r\nfacta ipsius oblivione obruentur.\r\n\r\nNam quibus rebus efficiuntur voluptates, eae non sunt in\r\npotestate sapientis.\r\n</p><p><i>An tu me de L.</i> Illud non continuo, ut aeque incontentae. Hoc non est positum in nostra actione. Quippe: habes enim a rhetoribus;</p>', 0, 1, 0, '2021-03-28 17:10:34', '2021-03-28 17:10:34');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(211) NOT NULL,
  `slug` varchar(211) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Tag 1', 'Tag-1', '2021-03-28 15:56:29', '2021-03-28 15:56:29'),
(2, 'Tag 2', 'Tag-2', '2021-03-28 15:56:34', '2021-03-28 15:56:34'),
(3, 'Tag 3', 'Tag-3', '2021-03-28 15:56:41', '2021-03-28 15:56:41'),
(4, 'Tag 4', 'Tag-4', '2021-03-28 15:56:45', '2021-03-28 15:56:45'),
(5, 'Tag 5', 'Tag-5', '2021-03-28 15:56:51', '2021-03-28 15:56:51'),
(6, 'Tag 8', 'Tag-8', '2021-03-28 15:56:56', '2021-03-28 15:56:56'),
(7, 'Tag 7', 'Tag-7', '2021-03-28 15:57:01', '2021-03-28 15:57:01'),
(8, 'Tag 9', 'Tag-9', '2021-03-28 15:57:05', '2021-03-28 15:57:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(211) NOT NULL,
  `slug` varchar(211) NOT NULL,
  `email` varchar(211) NOT NULL,
  `password` varchar(211) NOT NULL,
  `is_admin` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `banned` int(11) NOT NULL DEFAULT 0,
  `active` int(11) NOT NULL DEFAULT 1,
  `ip_address` varchar(211) NOT NULL,
  `about_me` text DEFAULT NULL,
  `website_url` varchar(211) DEFAULT NULL,
  `phone` varchar(211) DEFAULT NULL,
  `street` varchar(211) DEFAULT NULL,
  `city` varchar(211) DEFAULT NULL,
  `state` varchar(211) DEFAULT NULL,
  `postal_code` varchar(211) DEFAULT NULL,
  `featured_image` varchar(211) DEFAULT 'https://usapng.com/images/thumb/200_/user-icon-6.webp',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `slug`, `email`, `password`, `is_admin`, `banned`, `active`, `ip_address`, `about_me`, `website_url`, `phone`, `street`, `city`, `state`, `postal_code`, `featured_image`, `created_at`, `updated_at`) VALUES
(1, 'Milan Janković', '', 'milanj31@gmail.com', '$2y$10$W9/61roMEPf42Le8MtPW7.UpwcLQw1.0769SH/tmE53LMTouc36EC', 1, 0, 1, '::1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://usapng.com/images/thumb/200_/user-icon-6.webp', '2021-03-28 15:57:32', '2021-03-28 15:57:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favourite_posts`
--
ALTER TABLE `favourite_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQUE` (`slug`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `favourite_posts`
--
ALTER TABLE `favourite_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
