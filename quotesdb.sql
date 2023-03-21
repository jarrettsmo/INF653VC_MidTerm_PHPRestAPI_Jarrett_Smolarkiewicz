--
-- PostgreSQL database dump
--

-- Dumped from database version 15.2
-- Dumped by pg_dump version 15.2

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: authors; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.authors (
    id integer NOT NULL,
    author character varying(50) NOT NULL
);


ALTER TABLE public.authors OWNER TO postgres;

--
-- Name: authors_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.authors_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.authors_id_seq OWNER TO postgres;

--
-- Name: authors_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.authors_id_seq OWNED BY public.authors.id;


--
-- Name: categories; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.categories (
    id integer NOT NULL,
    category character varying(20) NOT NULL
);


ALTER TABLE public.categories OWNER TO postgres;

--
-- Name: categories_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.categories_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.categories_id_seq OWNER TO postgres;

--
-- Name: categories_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.categories_id_seq OWNED BY public.categories.id;


--
-- Name: quotes; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.quotes (
    id integer NOT NULL,
    quote text NOT NULL,
    author_id integer NOT NULL,
    category_id integer NOT NULL
);


ALTER TABLE public.quotes OWNER TO postgres;

--
-- Name: quotes_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.quotes_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.quotes_id_seq OWNER TO postgres;

--
-- Name: quotes_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.quotes_id_seq OWNED BY public.quotes.id;


--
-- Name: authors id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.authors ALTER COLUMN id SET DEFAULT nextval('public.authors_id_seq'::regclass);


--
-- Name: categories id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.categories ALTER COLUMN id SET DEFAULT nextval('public.categories_id_seq'::regclass);


--
-- Name: quotes id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.quotes ALTER COLUMN id SET DEFAULT nextval('public.quotes_id_seq'::regclass);


--
-- Data for Name: authors; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.authors (id, author) FROM stdin;
1	Nelson Mandela
2	Jesus Christ
8	Mother Teresa
12	Abraham Lincoln
13	James A. Garfield
14	Luis Bunuel
15	Mark Twain
16	Pablo Picasso
17	Steve Martin
18	Anthony Burgess
19	Jack Handey
20	Will Ferrell
21	Paul the Apostle
22	Peter the Apostle
23	Vince Lombardi
24	Michael Jordan
25	Pele
3	James the Brother of Jesus Christ
4	Melody Beattie
5	Alan Cohen
6	Walter Winchell
7	Ralph Marston
9	Cristiano Ronaldo
10	Ralph Waldo Emerson
11	Joseph Joubert
26	Princess Diana
27	Martin Luther King, Jr.
28	Maya Angelou
29	Rear Admiral Grace Murray Hopper
30	Warren Bennis
31	General George Patton
32	John Maxwell
33	Napoleon Bonaparte
34	Lou Holtz
\.


--
-- Data for Name: categories; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.categories (id, category) FROM stdin;
1	Leadership
2	Courage
3	Kindness
4	Comfort
5	Gratitude
6	Perseverance
7	Love
8	Humor
\.


--
-- Data for Name: quotes; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.quotes (id, quote, author_id, category_id) FROM stdin;
1	Man cannot live by bread alone; he must have peanut butter.	13	8
2	No man has a good enough memory to be a successful liar.	12	8
3	Age is something that doesn't matter unless you are a cheese.	14	8
4	The only way to keep your health is to eat what you don't want, drink what you don't like, and do what you'd rather not.	15	8
5	I'd like to live like a poor man—only with lots of money.	16	8
6	A day without sunshine is like, you know, night.	17	8
7	Laugh and the world laughs with you, snore and you sleep alone.	18	8
8	Before you criticize someone, you should walk a mile in their shoes. That way when you criticize them, you are a mile away from them and you have their shoes.	19	8
9	Before you marry a person, you should first make them use a computer with slow Internet to see who they really are.	20	8
10	A new command I give you: Love one another. As I have loved you, so you must love one another.	2	7
11	Do everything in love.	21	7
12	For God so loved the world, that he gave his only Son, that whoever believes in him should not perish but have eternal life.	2	7
13	Love is patient, love is kind. It does not envy, it does not boast, it is not proud. It does not dishonor others, it is not self-seeking, it is not easily angered, it keeps no record of wrongs.	21	7
14	Be completely humble and gentle; be patient, bearing with one another in love.	21	7
15	Above all, love each other deeply, because love covers over a multitude of sins.	22	7
16	The price of success is hard work, dedication to the job at hand, and the determination that whether we win or lose, we have applied the best of ourselves to the task at hand.	23	6
17	If you run into a wall, don't turn around and give up. Figure out how to climb it.	24	6
18	Success is no accident. It is hard work, perseverance, learning, studying, sacrifice and most of all, love of what you are doing or learning to do.	25	6
19	Ability is what you're capable of doing. Motivation determines what you do. Attitude determines how well you do it.	34	6
20	Count it all joy, my brothers, when you meet trials of various kinds, for you know that the testing of your faith produces steadfastness. And let steadfastness have its full effect, that you may be perfect and complete, lacking in nothing.	3	6
21	Gratitude, like faith, is a muscle. The more you use it, the stronger it grows.	5	5
22	Gratitude unlocks the fullness of life. It turns what we have into enough, and more. It turns denial into acceptance, chaos to order, confusion to clarity. It can turn a meal into a feast, a house into a home, a stranger into a friend.	4	5
23	Rejoice always, pray continually, give thanks in all circumstances; for this is God's will for you in Christ Jesus.	21	5
24	Come to me, all who labor and are heavy laden, and I will give you rest.	2	4
25	A real friend is one who walks in when the rest of the world walks out.	6	4
26	Rest when you're weary. Refresh and renew yourself, your body, your mind, your spirit. Then get back to work.	7	4
27	I think sometimes the best training is to rest.	9	4
28	You cannot do kindness too soon, for you never know how soon it will be too late.	10	3
29	A part of kindness consists in loving people more than they deserve.	11	3
30	Carry out a random act of kindness, with no expectation of reward, safe in the knowledge that one day someone might do the same for you.	26	3
31	Spread love everywhere you go. Let no one ever come to you without leaving happier.	8	3
32	Courage is resistance to fear, mastery of fear, not absence of fear.	15	2
33	We must build dikes of courage to hold back the flood of fear.	27	2
34	Without courage, we cannot practice any other virtue with consistency. We can't be kind, true, merciful, generous, or honest.	28	2
35	You manage things; you lead people.	29	1
36	Leadership is the capacity to translate vision into reality.	30	1
37	Lead me, follow me, or get out of my way.	31	1
38	A leader is one who knows the way, goes the way, and shows the way.	32	1
39	A leader is a dealer in hope.	33	1
\.


--
-- Name: authors_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.authors_id_seq', 34, true);


--
-- Name: categories_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.categories_id_seq', 8, true);


--
-- Name: quotes_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.quotes_id_seq', 39, true);


--
-- Name: authors authors_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.authors
    ADD CONSTRAINT authors_pkey PRIMARY KEY (id);


--
-- Name: categories categories_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.categories
    ADD CONSTRAINT categories_pkey PRIMARY KEY (id);


--
-- Name: quotes quotes_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.quotes
    ADD CONSTRAINT quotes_pkey PRIMARY KEY (id);


--
-- Name: quotes fk_authors; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.quotes
    ADD CONSTRAINT fk_authors FOREIGN KEY (author_id) REFERENCES public.authors(id);


--
-- Name: quotes fk_categories; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.quotes
    ADD CONSTRAINT fk_categories FOREIGN KEY (category_id) REFERENCES public.categories(id);


--
-- PostgreSQL database dump complete
--

