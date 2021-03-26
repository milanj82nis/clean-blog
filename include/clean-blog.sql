-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2021 at 03:45 AM
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
(55, 'd wq dqw dqw dwq', 'd-wq-dqw-dqw-dwq', '2021-03-23 23:17:50', '2021-03-23 23:17:50'),
(56, 'd wq dwq wqd dwq', 'd-wq-dwq-wqd-dwq', '2021-03-23 23:17:52', '2021-03-23 23:17:52'),
(57, 'd qwd qw dqw dqw', 'd-qwd-qw-dqw-dqw', '2021-03-23 23:17:53', '2021-03-23 23:17:53'),
(60, 'My category is awesome.', 'My-category-is-awesome-', '2021-03-23 23:17:59', '2021-03-23 23:17:59'),
(61, 'This is new name of category', 'This-is-new-name-of-category', '2021-03-23 23:18:00', '2021-03-23 23:18:00');

-- --------------------------------------------------------

--
-- Table structure for table `favourite_posts`
--

CREATE TABLE `favourite_posts` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `favourite_posts`
--

INSERT INTO `favourite_posts` (`id`, `post_id`, `user_id`) VALUES
(18, 4, 1),
(20, 2, 1),
(21, 6, 1),
(22, 16, 1);

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

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `from_user`, `to_user`, `message`, `created_at`) VALUES
(1, 10, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. A quibus propter discendi cupiditatem videmus ultimas terras esse peragratas. Quis non odit sordidos, vanos, leves, futtiles? Duo Reges: constructio interrete. Nunc omni virtuti vitium contrario nomine opponitur. Sed est forma eius disciplinae, sicut fere ceterarum, triplex: una pars est naturae, disserendi altera, vivendi tertia. Et summatim quidem haec erant de corpore animoque dicenda, quibus quasi informatum est quid hominis natura postulet. Scripta sane et multa et polita, sed nescio quo pacto auctoritatem oratio non habet. Tum mihi Piso: Quid ergo? Animum autem reliquis rebus ita perfecit, ut corpus; Qui ita affectus, beatum esse numquam probabis;', '2021-03-17 03:08:11'),
(2, 10, 1, 'Immo alio genere; Summus dolor plures dies manere non potest? Cum autem venissemus in Academiae non sine causa nobilitata spatia, solitudo erat ea, quam volueramus. At multis malis affectus. Illi enim inter se dissentiunt.', '2021-03-17 16:35:40'),
(3, 1, 10, 'Immo alio genere; Summus dolor plures dies manere non potest? Cum autem venissemus in Academiae non sine causa nobilitata spatia, solitudo erat ea, quam volueramus. At multis malis affectus. Illi enim inter se dissentiunt.\r\n\r\nHic quoque suus est de summoque bono dissentiens dici vere Peripateticus non potest. Non potes, nisi retexueris illa. Quid autem habent admirationis, cum prope accesseris? Hosne igitur laudas et hanc eorum, inquam, sententiam sequi nos censes oportere? Dici enim nihil potest verius. Memini me adesse P. Naturales divitias dixit parabiles esse, quod parvo esset natura contenta. In his igitur partibus duabus nihil erat, quod Zeno commutare gestiret. De quibus cupio scire quid sentias. Quod non faceret, si in voluptate summum bonum poneret. Aliter enim nosmet ipsos nosse non possumus. Videsne quam sit magna dissensio?', '2021-03-08 03:08:41'),
(4, 9, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. A quibus propter discendi cupiditatem videmus ultimas terras esse peragratas. Quis non odit sordidos, vanos, leves, futtiles? Duo Reges: constructio interrete. Nunc omni virtuti vitium contrario nomine opponitur. Sed est forma eius disciplinae, sicut fere ceterarum, triplex: una pars est naturae, disserendi altera, vivendi tertia. Et summatim quidem haec erant de corpore animoque dicenda, quibus quasi informatum est quid hominis natura postulet. Scripta sane et multa et polita, sed nescio quo pacto auctoritatem oratio non habet. Tum mihi Piso: Quid ergo? Animum autem reliquis rebus ita perfecit, ut corpus; Qui ita affectus, beatum esse numquam probabis;', '2021-03-17 03:08:11'),
(5, 9, 1, 'Immo alio genere; Summus dolor plures dies manere non potest? Cum autem venissemus in Academiae non sine causa nobilitata spatia, solitudo erat ea, quam volueramus. At multis malis affectus. Illi enim inter se dissentiunt.', '2021-03-17 16:35:40'),
(6, 1, 9, 'Test message from Milan\r\n', '2021-03-26 03:42:04'),
(7, 1, 9, 'Another mesage from milan.just test message', '2021-03-26 03:42:46');

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
(1, 'Post title', 'Post-title', 1, 1, 3, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQzDpyXT73yJQS_rAFLSNe_hZF4YkwQZ7r4nA&usqp=CAU', 'This is post excerpt', 'This is post content', 1233, 1, 0, '2021-03-13 12:47:44', '2021-03-13 12:47:44'),
(3, 'Post title', 'Post-title12', 1, 1, 3, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQzDpyXT73yJQS_rAFLSNe_hZF4YkwQZ7r4nA&usqp=CAU', 'This is post excerpt', 'This is post content', 1233, 1, 0, '2021-03-13 12:47:44', '2021-03-13 12:47:44'),
(5, 'Post title', 'Post-title21212', 1, 9, 3, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQzDpyXT73yJQS_rAFLSNe_hZF4YkwQZ7r4nA&usqp=CAU', 'This is post excerpt', 'This is post content', 1233, 1, 0, '2021-03-13 12:47:44', '2021-03-13 12:47:44'),
(7, 'Post title', 'Post-title122121212', 1, 1, 3, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQzDpyXT73yJQS_rAFLSNe_hZF4YkwQZ7r4nA&usqp=CAU', 'This is post excerpt', 'This is post content', 1233, 1, 0, '2021-03-13 12:47:44', '2021-03-13 12:47:44'),
(9, 'Post title', 'Post-title3213123132', 1, 6, 3, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQzDpyXT73yJQS_rAFLSNe_hZF4YkwQZ7r4nA&usqp=CAU', 'This is post excerpt', 'This is post content', 1233, 1, 0, '2021-03-13 12:47:44', '2021-03-13 12:47:44'),
(13, 'Post title', 'Post-title21212', 1, 1, 3, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQzDpyXT73yJQS_rAFLSNe_hZF4YkwQZ7r4nA&usqp=CAU', 'This is post excerpt', 'This is post content', 1233, 1, 0, '2021-03-13 12:47:44', '2021-03-13 12:47:44'),
(15, 'Post title', 'Post-title122121212', 1, 9, 3, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQzDpyXT73yJQS_rAFLSNe_hZF4YkwQZ7r4nA&usqp=CAU', 'This is post excerpt', 'This is post content', 1233, 1, 0, '2021-03-13 12:47:44', '2021-03-13 12:47:44'),
(16, 'This is new title', 'This-is-new-title', 1, 60, 2, 'http://milanjankovic.in.rs/images/post.jpg', '<p><strong>csaasscascasscasccsacascascascas</strong></p>', '<p>sacasscascasc</p>', 0, 1, 0, '2021-03-14 20:51:21', '2021-03-14 20:51:21'),
(17, 'Post title', 'Post-title', 1, 1, 3, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQzDpyXT73yJQS_rAFLSNe_hZF4YkwQZ7r4nA&usqp=CAU', 'This is post excerpt', 'This is post content', 1233, 1, 0, '2021-03-13 12:47:44', '2021-03-13 12:47:44'),
(19, 'Post title', 'Post-title12', 1, 9, 3, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQzDpyXT73yJQS_rAFLSNe_hZF4YkwQZ7r4nA&usqp=CAU', 'This is post excerpt', 'This is post content', 1233, 1, 0, '2021-03-13 12:47:44', '2021-03-13 12:47:44'),
(20, 'At ille pellit, qui permulcet sensum voluptate.', 'At-ille-pellit-qui-permulce21t-sensum-voluptate-', 1, 9, 3, 'http://milanjankovic.in.rs/images/image.png', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. <strong>Sed plane dicit quod intellegit.</strong> Teneo, inquit, finem illi videri nihil dolere. Quod cum dixissent, ille contra</p>', '<h2>At ille pellit, qui permulcet sensum voluptate.</h2><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. <strong>Sed plane dicit quod intellegit.</strong> Teneo, inquit, finem illi videri nihil dolere. Quod cum dixissent, ille contra.</p><p><a href=\"http://loripsum.net/\">Cum praesertim illa perdiscere ludus esset.</a> Quid me istud rogas? Ut pulsi recurrant? Ita credo. Istam voluptatem, inquit, Epicurus ignorat? <i>Quid enim possumus hoc agere divinius?</i> Beatus sibi videtur esse moriens.</p><p>Respondeat totidem verbis.</p><p>Et hunc idem dico, inquieta sed ad virtutes et ad vitia nihil interesse.</p><p>Nulla erit controversia.</p><p>Eam tum adesse, cum dolor omnis absit;</p><p>Quibusnam praeteritis?</p><p>Aliter homines, aliter philosophos loqui putas oportere?</p><ol><li>Respondent extrema primis, media utrisque, omnia omnibus.</li><li>Commentarios quosdam, inquam, Aristotelios, quos hic sciebam esse, veni ut auferrem, quos legerem, dum essem otiosus;</li><li>Is ita vivebat, ut nulla tam exquisita posset inveniri voluptas, qua non abundaret.</li><li>Nisi autem rerum natura perspecta erit, nullo modo poterimus sensuum iudicia defendere.</li><li>Uterque enim summo bono fruitur, id est voluptate.</li></ol><p>Illi enim inter se dissentiunt. Sed ad rem redeamus; <strong>Sed haec in pueris;</strong> <a href=\"http://loripsum.net/\">Illi enim inter se dissentiunt.</a> Qua tu etiam inprudens utebare non numquam. Equidem etiam Epicurum, in physicis quidem, Democriteum puto.</p><ul><li>Quodsi ipsam honestatem undique pertectam atque absolutam.</li><li>Haec mihi videtur delicatior, ut ita dicam, molliorque ratio, quam virtutis vis gravitasque postulat.</li></ul><p>Ergo illi intellegunt quid Epicurus dicat, ego non\r\nintellego?\r\n\r\nSi longus, levis.\r\n</p><p>Expectoque quid ad id, quod quaerebam, respondeas. Recte, inquit, intellegis. Quamquam in hac divisione rem ipsam prorsus probo, elegantiam desidero. Duo Reges: constructio interrete.</p><blockquote><p>Crasso, quem semel ait in vita risisse Lucilius, non contigit, ut ea re minus agelastoj ut ait idem, vocaretur.&nbsp;</p></blockquote><h2>Qui est in parvis malis.</h2><p>Sed haec omittamus; Duo enim genera quae erant, fecit tria. Sit hoc ultimum bonorum, quod nunc a me defenditur; <i>Nos cum te, M.</i></p>', 0, 1, 0, '2021-03-14 20:51:21', '2021-03-14 20:51:21'),
(21, 'Post title', 'Post-title21212', 1, 9, 3, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQzDpyXT73yJQS_rAFLSNe_hZF4YkwQZ7r4nA&usqp=CAU', 'This is post excerpt', 'This is post content', 1233, 1, 0, '2021-03-13 12:47:44', '2021-03-13 12:47:44'),
(22, 'At ille pellit, qui permulcet sensum voluptate.', 'At-ille-pellit-qui-permulcet-sensu21212m-voluptate-', 1, 1, 3, 'http://milanjankovic.in.rs/images/image.png', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. <strong>Sed plane dicit quod intellegit.</strong> Teneo, inquit, finem illi videri nihil dolere. Quod cum dixissent, ille contra</p>', '<h2>At ille pellit, qui permulcet sensum voluptate.</h2><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. <strong>Sed plane dicit quod intellegit.</strong> Teneo, inquit, finem illi videri nihil dolere. Quod cum dixissent, ille contra.</p><p><a href=\"http://loripsum.net/\">Cum praesertim illa perdiscere ludus esset.</a> Quid me istud rogas? Ut pulsi recurrant? Ita credo. Istam voluptatem, inquit, Epicurus ignorat? <i>Quid enim possumus hoc agere divinius?</i> Beatus sibi videtur esse moriens.</p><p>Respondeat totidem verbis.</p><p>Et hunc idem dico, inquieta sed ad virtutes et ad vitia nihil interesse.</p><p>Nulla erit controversia.</p><p>Eam tum adesse, cum dolor omnis absit;</p><p>Quibusnam praeteritis?</p><p>Aliter homines, aliter philosophos loqui putas oportere?</p><ol><li>Respondent extrema primis, media utrisque, omnia omnibus.</li><li>Commentarios quosdam, inquam, Aristotelios, quos hic sciebam esse, veni ut auferrem, quos legerem, dum essem otiosus;</li><li>Is ita vivebat, ut nulla tam exquisita posset inveniri voluptas, qua non abundaret.</li><li>Nisi autem rerum natura perspecta erit, nullo modo poterimus sensuum iudicia defendere.</li><li>Uterque enim summo bono fruitur, id est voluptate.</li></ol><p>Illi enim inter se dissentiunt. Sed ad rem redeamus; <strong>Sed haec in pueris;</strong> <a href=\"http://loripsum.net/\">Illi enim inter se dissentiunt.</a> Qua tu etiam inprudens utebare non numquam. Equidem etiam Epicurum, in physicis quidem, Democriteum puto.</p><ul><li>Quodsi ipsam honestatem undique pertectam atque absolutam.</li><li>Haec mihi videtur delicatior, ut ita dicam, molliorque ratio, quam virtutis vis gravitasque postulat.</li></ul><p>Ergo illi intellegunt quid Epicurus dicat, ego non\r\nintellego?\r\n\r\nSi longus, levis.\r\n</p><p>Expectoque quid ad id, quod quaerebam, respondeas. Recte, inquit, intellegis. Quamquam in hac divisione rem ipsam prorsus probo, elegantiam desidero. Duo Reges: constructio interrete.</p><blockquote><p>Crasso, quem semel ait in vita risisse Lucilius, non contigit, ut ea re minus agelastoj ut ait idem, vocaretur.&nbsp;</p></blockquote><h2>Qui est in parvis malis.</h2><p>Sed haec omittamus; Duo enim genera quae erant, fecit tria. Sit hoc ultimum bonorum, quod nunc a me defenditur; <i>Nos cum te, M.</i></p>', 0, 1, 0, '2021-03-14 20:51:21', '2021-03-14 20:51:21'),
(23, 'Post title', 'Post-title122121212', 1, 1, 3, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQzDpyXT73yJQS_rAFLSNe_hZF4YkwQZ7r4nA&usqp=CAU', 'This is post excerpt', 'This is post content', 1233, 1, 0, '2021-03-13 12:47:44', '2021-03-13 12:47:44'),
(24, 'At ille pellit, qui permulcet sensum voluptate.', 'At-ille-pellit-qui-p21323123123ermulce21t-sensum-voluptate-', 1, 1, 3, 'http://milanjankovic.in.rs/images/image.png', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. <strong>Sed plane dicit quod intellegit.</strong> Teneo, inquit, finem illi videri nihil dolere. Quod cum dixissent, ille contra</p>', '<h2>At ille pellit, qui permulcet sensum voluptate.</h2><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. <strong>Sed plane dicit quod intellegit.</strong> Teneo, inquit, finem illi videri nihil dolere. Quod cum dixissent, ille contra.</p><p><a href=\"http://loripsum.net/\">Cum praesertim illa perdiscere ludus esset.</a> Quid me istud rogas? Ut pulsi recurrant? Ita credo. Istam voluptatem, inquit, Epicurus ignorat? <i>Quid enim possumus hoc agere divinius?</i> Beatus sibi videtur esse moriens.</p><p>Respondeat totidem verbis.</p><p>Et hunc idem dico, inquieta sed ad virtutes et ad vitia nihil interesse.</p><p>Nulla erit controversia.</p><p>Eam tum adesse, cum dolor omnis absit;</p><p>Quibusnam praeteritis?</p><p>Aliter homines, aliter philosophos loqui putas oportere?</p><ol><li>Respondent extrema primis, media utrisque, omnia omnibus.</li><li>Commentarios quosdam, inquam, Aristotelios, quos hic sciebam esse, veni ut auferrem, quos legerem, dum essem otiosus;</li><li>Is ita vivebat, ut nulla tam exquisita posset inveniri voluptas, qua non abundaret.</li><li>Nisi autem rerum natura perspecta erit, nullo modo poterimus sensuum iudicia defendere.</li><li>Uterque enim summo bono fruitur, id est voluptate.</li></ol><p>Illi enim inter se dissentiunt. Sed ad rem redeamus; <strong>Sed haec in pueris;</strong> <a href=\"http://loripsum.net/\">Illi enim inter se dissentiunt.</a> Qua tu etiam inprudens utebare non numquam. Equidem etiam Epicurum, in physicis quidem, Democriteum puto.</p><ul><li>Quodsi ipsam honestatem undique pertectam atque absolutam.</li><li>Haec mihi videtur delicatior, ut ita dicam, molliorque ratio, quam virtutis vis gravitasque postulat.</li></ul><p>Ergo illi intellegunt quid Epicurus dicat, ego non\r\nintellego?\r\n\r\nSi longus, levis.\r\n</p><p>Expectoque quid ad id, quod quaerebam, respondeas. Recte, inquit, intellegis. Quamquam in hac divisione rem ipsam prorsus probo, elegantiam desidero. Duo Reges: constructio interrete.</p><blockquote><p>Crasso, quem semel ait in vita risisse Lucilius, non contigit, ut ea re minus agelastoj ut ait idem, vocaretur.&nbsp;</p></blockquote><h2>Qui est in parvis malis.</h2><p>Sed haec omittamus; Duo enim genera quae erant, fecit tria. Sit hoc ultimum bonorum, quod nunc a me defenditur; <i>Nos cum te, M.</i></p>', 0, 1, 0, '2021-03-14 20:51:21', '2021-03-14 20:51:21'),
(25, 'Post title', 'Post-title3213123132', 1, 1, 3, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQzDpyXT73yJQS_rAFLSNe_hZF4YkwQZ7r4nA&usqp=CAU', 'This is post excerpt', 'This is post content', 1233, 1, 0, '2021-03-13 12:47:44', '2021-03-13 12:47:44'),
(26, 'At ille pellit, qui permulcet sensum voluptate.', 'At-ille-pellit-32312312312qui-permulcet-sensum-voluptate-', 1, 1, 3, 'http://milanjankovic.in.rs/images/image.png', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. <strong>Sed plane dicit quod intellegit.</strong> Teneo, inquit, finem illi videri nihil dolere. Quod cum dixissent, ille contra</p>', '<h2>At ille pellit, qui permulcet sensum voluptate.</h2><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. <strong>Sed plane dicit quod intellegit.</strong> Teneo, inquit, finem illi videri nihil dolere. Quod cum dixissent, ille contra.</p><p><a href=\"http://loripsum.net/\">Cum praesertim illa perdiscere ludus esset.</a> Quid me istud rogas? Ut pulsi recurrant? Ita credo. Istam voluptatem, inquit, Epicurus ignorat? <i>Quid enim possumus hoc agere divinius?</i> Beatus sibi videtur esse moriens.</p><p>Respondeat totidem verbis.</p><p>Et hunc idem dico, inquieta sed ad virtutes et ad vitia nihil interesse.</p><p>Nulla erit controversia.</p><p>Eam tum adesse, cum dolor omnis absit;</p><p>Quibusnam praeteritis?</p><p>Aliter homines, aliter philosophos loqui putas oportere?</p><ol><li>Respondent extrema primis, media utrisque, omnia omnibus.</li><li>Commentarios quosdam, inquam, Aristotelios, quos hic sciebam esse, veni ut auferrem, quos legerem, dum essem otiosus;</li><li>Is ita vivebat, ut nulla tam exquisita posset inveniri voluptas, qua non abundaret.</li><li>Nisi autem rerum natura perspecta erit, nullo modo poterimus sensuum iudicia defendere.</li><li>Uterque enim summo bono fruitur, id est voluptate.</li></ol><p>Illi enim inter se dissentiunt. Sed ad rem redeamus; <strong>Sed haec in pueris;</strong> <a href=\"http://loripsum.net/\">Illi enim inter se dissentiunt.</a> Qua tu etiam inprudens utebare non numquam. Equidem etiam Epicurum, in physicis quidem, Democriteum puto.</p><ul><li>Quodsi ipsam honestatem undique pertectam atque absolutam.</li><li>Haec mihi videtur delicatior, ut ita dicam, molliorque ratio, quam virtutis vis gravitasque postulat.</li></ul><p>Ergo illi intellegunt quid Epicurus dicat, ego non\r\nintellego?\r\n\r\nSi longus, levis.\r\n</p><p>Expectoque quid ad id, quod quaerebam, respondeas. Recte, inquit, intellegis. Quamquam in hac divisione rem ipsam prorsus probo, elegantiam desidero. Duo Reges: constructio interrete.</p><blockquote><p>Crasso, quem semel ait in vita risisse Lucilius, non contigit, ut ea re minus agelastoj ut ait idem, vocaretur.&nbsp;</p></blockquote><h2>Qui est in parvis malis.</h2><p>Sed haec omittamus; Duo enim genera quae erant, fecit tria. Sit hoc ultimum bonorum, quod nunc a me defenditur; <i>Nos cum te, M.</i></p>', 0, 1, 0, '2021-03-14 20:51:21', '2021-03-14 20:51:21'),
(27, 'Post title', 'Post-title12323123123123', 1, 1, 3, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQzDpyXT73yJQS_rAFLSNe_hZF4YkwQZ7r4nA&usqp=CAU', 'This is post excerpt', 'This is post content', 1233, 1, 0, '2021-03-13 12:47:44', '2021-03-13 12:47:44'),
(28, 'At ille pellit, qui permulcet sensum voluptate.', 'At-ille-pellit-qui-permulce21t-sensum-voluptate-', 1, 1, 3, 'http://milanjankovic.in.rs/images/image.png', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. <strong>Sed plane dicit quod intellegit.</strong> Teneo, inquit, finem illi videri nihil dolere. Quod cum dixissent, ille contra</p>', '<h2>At ille pellit, qui permulcet sensum voluptate.</h2><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. <strong>Sed plane dicit quod intellegit.</strong> Teneo, inquit, finem illi videri nihil dolere. Quod cum dixissent, ille contra.</p><p><a href=\"http://loripsum.net/\">Cum praesertim illa perdiscere ludus esset.</a> Quid me istud rogas? Ut pulsi recurrant? Ita credo. Istam voluptatem, inquit, Epicurus ignorat? <i>Quid enim possumus hoc agere divinius?</i> Beatus sibi videtur esse moriens.</p><p>Respondeat totidem verbis.</p><p>Et hunc idem dico, inquieta sed ad virtutes et ad vitia nihil interesse.</p><p>Nulla erit controversia.</p><p>Eam tum adesse, cum dolor omnis absit;</p><p>Quibusnam praeteritis?</p><p>Aliter homines, aliter philosophos loqui putas oportere?</p><ol><li>Respondent extrema primis, media utrisque, omnia omnibus.</li><li>Commentarios quosdam, inquam, Aristotelios, quos hic sciebam esse, veni ut auferrem, quos legerem, dum essem otiosus;</li><li>Is ita vivebat, ut nulla tam exquisita posset inveniri voluptas, qua non abundaret.</li><li>Nisi autem rerum natura perspecta erit, nullo modo poterimus sensuum iudicia defendere.</li><li>Uterque enim summo bono fruitur, id est voluptate.</li></ol><p>Illi enim inter se dissentiunt. Sed ad rem redeamus; <strong>Sed haec in pueris;</strong> <a href=\"http://loripsum.net/\">Illi enim inter se dissentiunt.</a> Qua tu etiam inprudens utebare non numquam. Equidem etiam Epicurum, in physicis quidem, Democriteum puto.</p><ul><li>Quodsi ipsam honestatem undique pertectam atque absolutam.</li><li>Haec mihi videtur delicatior, ut ita dicam, molliorque ratio, quam virtutis vis gravitasque postulat.</li></ul><p>Ergo illi intellegunt quid Epicurus dicat, ego non\r\nintellego?\r\n\r\nSi longus, levis.\r\n</p><p>Expectoque quid ad id, quod quaerebam, respondeas. Recte, inquit, intellegis. Quamquam in hac divisione rem ipsam prorsus probo, elegantiam desidero. Duo Reges: constructio interrete.</p><blockquote><p>Crasso, quem semel ait in vita risisse Lucilius, non contigit, ut ea re minus agelastoj ut ait idem, vocaretur.&nbsp;</p></blockquote><h2>Qui est in parvis malis.</h2><p>Sed haec omittamus; Duo enim genera quae erant, fecit tria. Sit hoc ultimum bonorum, quod nunc a me defenditur; <i>Nos cum te, M.</i></p>', 0, 1, 0, '2021-03-14 20:51:21', '2021-03-14 20:51:21'),
(29, 'Post title', 'Post-title21212', 1, 1, 3, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQzDpyXT73yJQS_rAFLSNe_hZF4YkwQZ7r4nA&usqp=CAU', 'This is post excerpt', 'This is post content', 1233, 1, 0, '2021-03-13 12:47:44', '2021-03-13 12:47:44'),
(30, 'At ille pellit, qui permulcet sensum voluptate.', 'At-ille-pellit-qui-permulcet-sensu21212m-voluptate-', 1, 1, 3, 'http://milanjankovic.in.rs/images/image.png', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. <strong>Sed plane dicit quod intellegit.</strong> Teneo, inquit, finem illi videri nihil dolere. Quod cum dixissent, ille contra</p>', '<h2>At ille pellit, qui permulcet sensum voluptate.</h2><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. <strong>Sed plane dicit quod intellegit.</strong> Teneo, inquit, finem illi videri nihil dolere. Quod cum dixissent, ille contra.</p><p><a href=\"http://loripsum.net/\">Cum praesertim illa perdiscere ludus esset.</a> Quid me istud rogas? Ut pulsi recurrant? Ita credo. Istam voluptatem, inquit, Epicurus ignorat? <i>Quid enim possumus hoc agere divinius?</i> Beatus sibi videtur esse moriens.</p><p>Respondeat totidem verbis.</p><p>Et hunc idem dico, inquieta sed ad virtutes et ad vitia nihil interesse.</p><p>Nulla erit controversia.</p><p>Eam tum adesse, cum dolor omnis absit;</p><p>Quibusnam praeteritis?</p><p>Aliter homines, aliter philosophos loqui putas oportere?</p><ol><li>Respondent extrema primis, media utrisque, omnia omnibus.</li><li>Commentarios quosdam, inquam, Aristotelios, quos hic sciebam esse, veni ut auferrem, quos legerem, dum essem otiosus;</li><li>Is ita vivebat, ut nulla tam exquisita posset inveniri voluptas, qua non abundaret.</li><li>Nisi autem rerum natura perspecta erit, nullo modo poterimus sensuum iudicia defendere.</li><li>Uterque enim summo bono fruitur, id est voluptate.</li></ol><p>Illi enim inter se dissentiunt. Sed ad rem redeamus; <strong>Sed haec in pueris;</strong> <a href=\"http://loripsum.net/\">Illi enim inter se dissentiunt.</a> Qua tu etiam inprudens utebare non numquam. Equidem etiam Epicurum, in physicis quidem, Democriteum puto.</p><ul><li>Quodsi ipsam honestatem undique pertectam atque absolutam.</li><li>Haec mihi videtur delicatior, ut ita dicam, molliorque ratio, quam virtutis vis gravitasque postulat.</li></ul><p>Ergo illi intellegunt quid Epicurus dicat, ego non\r\nintellego?\r\n\r\nSi longus, levis.\r\n</p><p>Expectoque quid ad id, quod quaerebam, respondeas. Recte, inquit, intellegis. Quamquam in hac divisione rem ipsam prorsus probo, elegantiam desidero. Duo Reges: constructio interrete.</p><blockquote><p>Crasso, quem semel ait in vita risisse Lucilius, non contigit, ut ea re minus agelastoj ut ait idem, vocaretur.&nbsp;</p></blockquote><h2>Qui est in parvis malis.</h2><p>Sed haec omittamus; Duo enim genera quae erant, fecit tria. Sit hoc ultimum bonorum, quod nunc a me defenditur; <i>Nos cum te, M.</i></p>', 0, 1, 0, '2021-03-14 20:51:21', '2021-03-14 20:51:21'),
(31, 'Post title', 'Post-title122121212', 1, 1, 3, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQzDpyXT73yJQS_rAFLSNe_hZF4YkwQZ7r4nA&usqp=CAU', 'This is post excerpt', 'This is post content', 1233, 1, 0, '2021-03-13 12:47:44', '2021-03-13 12:47:44'),
(32, 'At ille pellit, qui permulcet sensum voluptate.', 'At-ille-pellit-qui-p21323123123ermulce21t-sensum-voluptate-', 1, 1, 3, 'http://milanjankovic.in.rs/images/image.png', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. <strong>Sed plane dicit quod intellegit.</strong> Teneo, inquit, finem illi videri nihil dolere. Quod cum dixissent, ille contra</p>', '<h2>At ille pellit, qui permulcet sensum voluptate.</h2><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. <strong>Sed plane dicit quod intellegit.</strong> Teneo, inquit, finem illi videri nihil dolere. Quod cum dixissent, ille contra.</p><p><a href=\"http://loripsum.net/\">Cum praesertim illa perdiscere ludus esset.</a> Quid me istud rogas? Ut pulsi recurrant? Ita credo. Istam voluptatem, inquit, Epicurus ignorat? <i>Quid enim possumus hoc agere divinius?</i> Beatus sibi videtur esse moriens.</p><p>Respondeat totidem verbis.</p><p>Et hunc idem dico, inquieta sed ad virtutes et ad vitia nihil interesse.</p><p>Nulla erit controversia.</p><p>Eam tum adesse, cum dolor omnis absit;</p><p>Quibusnam praeteritis?</p><p>Aliter homines, aliter philosophos loqui putas oportere?</p><ol><li>Respondent extrema primis, media utrisque, omnia omnibus.</li><li>Commentarios quosdam, inquam, Aristotelios, quos hic sciebam esse, veni ut auferrem, quos legerem, dum essem otiosus;</li><li>Is ita vivebat, ut nulla tam exquisita posset inveniri voluptas, qua non abundaret.</li><li>Nisi autem rerum natura perspecta erit, nullo modo poterimus sensuum iudicia defendere.</li><li>Uterque enim summo bono fruitur, id est voluptate.</li></ol><p>Illi enim inter se dissentiunt. Sed ad rem redeamus; <strong>Sed haec in pueris;</strong> <a href=\"http://loripsum.net/\">Illi enim inter se dissentiunt.</a> Qua tu etiam inprudens utebare non numquam. Equidem etiam Epicurum, in physicis quidem, Democriteum puto.</p><ul><li>Quodsi ipsam honestatem undique pertectam atque absolutam.</li><li>Haec mihi videtur delicatior, ut ita dicam, molliorque ratio, quam virtutis vis gravitasque postulat.</li></ul><p>Ergo illi intellegunt quid Epicurus dicat, ego non\r\nintellego?\r\n\r\nSi longus, levis.\r\n</p><p>Expectoque quid ad id, quod quaerebam, respondeas. Recte, inquit, intellegis. Quamquam in hac divisione rem ipsam prorsus probo, elegantiam desidero. Duo Reges: constructio interrete.</p><blockquote><p>Crasso, quem semel ait in vita risisse Lucilius, non contigit, ut ea re minus agelastoj ut ait idem, vocaretur.&nbsp;</p></blockquote><h2>Qui est in parvis malis.</h2><p>Sed haec omittamus; Duo enim genera quae erant, fecit tria. Sit hoc ultimum bonorum, quod nunc a me defenditur; <i>Nos cum te, M.</i></p>', 0, 1, 0, '2021-03-14 20:51:21', '2021-03-14 20:51:21');

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
(2, 'Tag 23', 'Tag-23', '2021-03-12 11:27:30', '2021-03-12 11:27:30'),
(3, 'My  tag', 'My-tag', '2021-03-12 11:30:45', '2021-03-12 11:30:45');

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
  `featured_image` varchar(211) DEFAULT 'https://usapng.com/images/thumb/200_/user-icon-6.webp',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `slug`, `email`, `password`, `is_admin`, `banned`, `active`, `ip_address`, `featured_image`, `created_at`, `updated_at`) VALUES
(1, 'Milan Janković', '', 'milanj31@gmail.com', '$2y$10$LvDw2KlgrjtPuEl/mahff.BpPyk12dYk/Ks0ZwaPlPmS5QQ3AHRma', 1, 0, 1, '::1', 'https://usapng.com/images/thumb/200_/user-icon-6.webp', '2021-03-23 16:17:46', '2021-03-23 16:17:46'),
(9, 'Melenko Milenkovic', 'Melenko-Milenkovic', 'milenko@gmail.com', '$2y$10$3pBUPjOlnx/ydqpUhgbKjOJmjWMuX.D.4RI55p1f/2FmCUnttRLiW', 1, 0, 1, '', 'https://usapng.com/images/thumb/200_/user-icon-6.webp', '2021-03-24 21:34:36', '2021-03-24 21:34:36'),
(10, 'Jovan Jovanovic', 'Jovan-Jovanovic', 'j.jovan@gmail.com', '$2y$10$3pBUPjOlnx/ydqpUhgbKjOJmjWMuX.D.4RI55p1f/2FmCUnttRLiW', 0, 0, 1, '', 'https://usapng.com/images/thumb/200_/user-icon-6.webp', '2021-03-24 21:34:36', '2021-03-24 21:34:36');

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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `favourite_posts`
--
ALTER TABLE `favourite_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
