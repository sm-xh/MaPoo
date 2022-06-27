--
-- PostgreSQL database dump
--

-- Dumped from database version 14.4 (Ubuntu 14.4-1.pgdg20.04+1)
-- Dumped by pg_dump version 14.4

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

--
-- Name: public; Type: SCHEMA; Schema: -; Owner: ugomugtajxtuez
--

CREATE SCHEMA public;


ALTER SCHEMA public OWNER TO ugomugtajxtuez;

--
-- Name: SCHEMA public; Type: COMMENT; Schema: -; Owner: ugomugtajxtuez
--

COMMENT ON SCHEMA public IS 'standard public schema';


--
-- Name: user_insert_trigger_fnc(); Type: FUNCTION; Schema: public; Owner: ugomugtajxtuez
--

CREATE FUNCTION public.user_insert_trigger_fnc() RETURNS trigger
    LANGUAGE plpgsql
    AS $$
DECLARE last_userId integer;

BEGIN


    SELECT max(id_user)
        INTO last_userId
        FROM users;

    INSERT INTO users_details (id_user) VALUES (last_userId);

    INSERT INTO user_permissions (user_role, id_user) VALUES (2, last_userId);

    RETURN NEW;

END;

$$;


ALTER FUNCTION public.user_insert_trigger_fnc() OWNER TO ugomugtajxtuez;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: addresses; Type: TABLE; Schema: public; Owner: ugomugtajxtuez
--

CREATE TABLE public.addresses (
    id_address integer NOT NULL,
    country character varying(255),
    city character varying(255),
    zip character varying(255),
    street character varying(255),
    house_number character varying(10),
    id_pin integer
);


ALTER TABLE public.addresses OWNER TO ugomugtajxtuez;

--
-- Name: addresses_id_address_seq; Type: SEQUENCE; Schema: public; Owner: ugomugtajxtuez
--

CREATE SEQUENCE public.addresses_id_address_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.addresses_id_address_seq OWNER TO ugomugtajxtuez;

--
-- Name: addresses_id_address_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: ugomugtajxtuez
--

ALTER SEQUENCE public.addresses_id_address_seq OWNED BY public.addresses.id_address;


--
-- Name: permission_definitions; Type: TABLE; Schema: public; Owner: ugomugtajxtuez
--

CREATE TABLE public.permission_definitions (
    id_permission integer,
    role_description character varying
);


ALTER TABLE public.permission_definitions OWNER TO ugomugtajxtuez;

--
-- Name: pin-authors; Type: TABLE; Schema: public; Owner: ugomugtajxtuez
--

CREATE TABLE public."pin-authors" (
    id_relation integer NOT NULL,
    id_user integer,
    id_pin integer
);


ALTER TABLE public."pin-authors" OWNER TO ugomugtajxtuez;

--
-- Name: pin-author_relation_id_relation_seq; Type: SEQUENCE; Schema: public; Owner: ugomugtajxtuez
--

CREATE SEQUENCE public."pin-author_relation_id_relation_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."pin-author_relation_id_relation_seq" OWNER TO ugomugtajxtuez;

--
-- Name: pin-author_relation_id_relation_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: ugomugtajxtuez
--

ALTER SEQUENCE public."pin-author_relation_id_relation_seq" OWNED BY public."pin-authors".id_relation;


--
-- Name: pins; Type: TABLE; Schema: public; Owner: ugomugtajxtuez
--

CREATE TABLE public.pins (
    id_pin integer NOT NULL,
    description character varying(255),
    likes_count integer,
    dislikes_count integer,
    coordinates character varying(100) NOT NULL,
    details character varying(255)
);


ALTER TABLE public.pins OWNER TO ugomugtajxtuez;

--
-- Name: pin_info; Type: VIEW; Schema: public; Owner: ugomugtajxtuez
--

CREATE VIEW public.pin_info AS
 SELECT p.description,
    p.coordinates,
    p.details,
    a.country,
    a.city,
    a.street,
    a.zip,
    a.house_number
   FROM (public.pins p
     LEFT JOIN public.addresses a ON ((p.id_pin = a.id_pin)));


ALTER TABLE public.pin_info OWNER TO ugomugtajxtuez;

--
-- Name: pins_id_pin_seq; Type: SEQUENCE; Schema: public; Owner: ugomugtajxtuez
--

CREATE SEQUENCE public.pins_id_pin_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.pins_id_pin_seq OWNER TO ugomugtajxtuez;

--
-- Name: pins_id_pin_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: ugomugtajxtuez
--

ALTER SEQUENCE public.pins_id_pin_seq OWNED BY public.pins.id_pin;


--
-- Name: sessions; Type: TABLE; Schema: public; Owner: ugomugtajxtuez
--

CREATE TABLE public.sessions (
    id_session integer NOT NULL,
    email character varying(100),
    cookie_code character varying(255),
    id_user integer
);


ALTER TABLE public.sessions OWNER TO ugomugtajxtuez;

--
-- Name: sessions_id_session_seq; Type: SEQUENCE; Schema: public; Owner: ugomugtajxtuez
--

CREATE SEQUENCE public.sessions_id_session_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.sessions_id_session_seq OWNER TO ugomugtajxtuez;

--
-- Name: sessions_id_session_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: ugomugtajxtuez
--

ALTER SEQUENCE public.sessions_id_session_seq OWNED BY public.sessions.id_session;


--
-- Name: users_details; Type: TABLE; Schema: public; Owner: ugomugtajxtuez
--

CREATE TABLE public.users_details (
    id_user_details integer NOT NULL,
    name character varying(100),
    surname character varying(100),
    reputation integer,
    id_user integer
);


ALTER TABLE public.users_details OWNER TO ugomugtajxtuez;

--
-- Name: table_name_id_user_details_seq; Type: SEQUENCE; Schema: public; Owner: ugomugtajxtuez
--

CREATE SEQUENCE public.table_name_id_user_details_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.table_name_id_user_details_seq OWNER TO ugomugtajxtuez;

--
-- Name: table_name_id_user_details_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: ugomugtajxtuez
--

ALTER SEQUENCE public.table_name_id_user_details_seq OWNED BY public.users_details.id_user_details;


--
-- Name: user_permissions; Type: TABLE; Schema: public; Owner: ugomugtajxtuez
--

CREATE TABLE public.user_permissions (
    id integer NOT NULL,
    user_role integer,
    id_user integer
);


ALTER TABLE public.user_permissions OWNER TO ugomugtajxtuez;

--
-- Name: user_permissions_id_seq; Type: SEQUENCE; Schema: public; Owner: ugomugtajxtuez
--

CREATE SEQUENCE public.user_permissions_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.user_permissions_id_seq OWNER TO ugomugtajxtuez;

--
-- Name: user_permissions_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: ugomugtajxtuez
--

ALTER SEQUENCE public.user_permissions_id_seq OWNED BY public.user_permissions.id;


--
-- Name: users; Type: TABLE; Schema: public; Owner: ugomugtajxtuez
--

CREATE TABLE public.users (
    id_user integer NOT NULL,
    email character varying(255) NOT NULL,
    password character varying(255) NOT NULL,
    salt character varying,
    creation_date date DEFAULT CURRENT_DATE
);


ALTER TABLE public.users OWNER TO ugomugtajxtuez;

--
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: ugomugtajxtuez
--

CREATE SEQUENCE public.users_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.users_id_seq OWNER TO ugomugtajxtuez;

--
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: ugomugtajxtuez
--

ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id_user;


--
-- Name: addresses id_address; Type: DEFAULT; Schema: public; Owner: ugomugtajxtuez
--

ALTER TABLE ONLY public.addresses ALTER COLUMN id_address SET DEFAULT nextval('public.addresses_id_address_seq'::regclass);


--
-- Name: pin-authors id_relation; Type: DEFAULT; Schema: public; Owner: ugomugtajxtuez
--

ALTER TABLE ONLY public."pin-authors" ALTER COLUMN id_relation SET DEFAULT nextval('public."pin-author_relation_id_relation_seq"'::regclass);


--
-- Name: pins id_pin; Type: DEFAULT; Schema: public; Owner: ugomugtajxtuez
--

ALTER TABLE ONLY public.pins ALTER COLUMN id_pin SET DEFAULT nextval('public.pins_id_pin_seq'::regclass);


--
-- Name: sessions id_session; Type: DEFAULT; Schema: public; Owner: ugomugtajxtuez
--

ALTER TABLE ONLY public.sessions ALTER COLUMN id_session SET DEFAULT nextval('public.sessions_id_session_seq'::regclass);


--
-- Name: user_permissions id; Type: DEFAULT; Schema: public; Owner: ugomugtajxtuez
--

ALTER TABLE ONLY public.user_permissions ALTER COLUMN id SET DEFAULT nextval('public.user_permissions_id_seq'::regclass);


--
-- Name: users id_user; Type: DEFAULT; Schema: public; Owner: ugomugtajxtuez
--

ALTER TABLE ONLY public.users ALTER COLUMN id_user SET DEFAULT nextval('public.users_id_seq'::regclass);


--
-- Name: users_details id_user_details; Type: DEFAULT; Schema: public; Owner: ugomugtajxtuez
--

ALTER TABLE ONLY public.users_details ALTER COLUMN id_user_details SET DEFAULT nextval('public.table_name_id_user_details_seq'::regclass);


--
-- Data for Name: addresses; Type: TABLE DATA; Schema: public; Owner: ugomugtajxtuez
--

COPY public.addresses (id_address, country, city, zip, street, house_number, id_pin) FROM stdin;
51	Poland	Kraków	31-153	Szlak	73	56
50	Poland	Kraków	31-504	Zygmunta Augusta	20	55
34	Poland	Kraków	31-124	Dolnych Młynów	10/3	39
49	Poland	Kraków	31-133	Karmelicka	45	54
48	Poland	Kraków	31-038	Starowiślna	21	53
33	Poland	Kraków	31-618	Teodora Parnickiego	10	38
\.


--
-- Data for Name: permission_definitions; Type: TABLE DATA; Schema: public; Owner: ugomugtajxtuez
--

COPY public.permission_definitions (id_permission, role_description) FROM stdin;
1	admin
2	user
3	disabled
\.


--
-- Data for Name: pin-authors; Type: TABLE DATA; Schema: public; Owner: ugomugtajxtuez
--

COPY public."pin-authors" (id_relation, id_user, id_pin) FROM stdin;
2	13	53
3	19	54
4	13	55
5	13	56
\.


--
-- Data for Name: pins; Type: TABLE DATA; Schema: public; Owner: ugomugtajxtuez
--

COPY public.pins (id_pin, description, likes_count, dislikes_count, coordinates, details) FROM stdin;
53	test-pin-author	0	0	{"point":["19.944367","50.057274"]}	{"free":"on","unisex":"off","disabled":"off","baby_change":"on"}
39	TEST	0	0	{"point":["19.926264","50.064728"]}	{"free":"on","unisex":"off","disabled":"off","baby_change":"on"}
54	Big Chugns	0	0	{"point":["19.93288","50.0635"]}	{"free":"on","unisex":"off","disabled":"on","baby_change":"on"}
38	toaleta 2	0	0	{"point":["19.995291","50.099448"]}	{"free":"on","unisex":"off","disabled":"off","baby_change":"off"}
55		\N	\N	{"point":["19.950605","50.065185"]}	{"free":"on","unisex":"off","disabled":"off","baby_change":"off"}
56		\N	\N	{"point":["19.9429","50.070601"]}	{"free":"on","unisex":"off","disabled":"off","baby_change":"off"}
\.


--
-- Data for Name: sessions; Type: TABLE DATA; Schema: public; Owner: ugomugtajxtuez
--

COPY public.sessions (id_session, email, cookie_code, id_user) FROM stdin;
\.


--
-- Data for Name: user_permissions; Type: TABLE DATA; Schema: public; Owner: ugomugtajxtuez
--

COPY public.user_permissions (id, user_role, id_user) FROM stdin;
1	2	13
2	2	19
3	1	20
\.


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: ugomugtajxtuez
--

COPY public.users (id_user, email, password, salt, creation_date) FROM stdin;
13	xxx@o2.pl	$2y$10$PSkaPN05BXaYZwgU8AuUS.usEET.04b5djyyG5OQ93a1eVPFvr0MW	\N	2022-06-22
19	new@o2.pl	$2y$10$THdMvct1LNFNhAE5MZOcAOnjSkt0qYS3nTzlEQK7T0e/oVyOSgiW.	\N	2022-06-23
20	admin	$2y$10$WFI3Hfc8fmWeqGJMJL8WduOFMDRPFtm87r7S1WrfjbvnawtGhsGOK	\N	2022-06-25
\.


--
-- Data for Name: users_details; Type: TABLE DATA; Schema: public; Owner: ugomugtajxtuez
--

COPY public.users_details (id_user_details, name, surname, reputation, id_user) FROM stdin;
6	\N	\N	\N	20
5	Jan	Kowal	\N	19
4	Piotr	Adamczyk	\N	13
\.


--
-- Name: addresses_id_address_seq; Type: SEQUENCE SET; Schema: public; Owner: ugomugtajxtuez
--

SELECT pg_catalog.setval('public.addresses_id_address_seq', 51, true);


--
-- Name: pin-author_relation_id_relation_seq; Type: SEQUENCE SET; Schema: public; Owner: ugomugtajxtuez
--

SELECT pg_catalog.setval('public."pin-author_relation_id_relation_seq"', 5, true);


--
-- Name: pins_id_pin_seq; Type: SEQUENCE SET; Schema: public; Owner: ugomugtajxtuez
--

SELECT pg_catalog.setval('public.pins_id_pin_seq', 56, true);


--
-- Name: sessions_id_session_seq; Type: SEQUENCE SET; Schema: public; Owner: ugomugtajxtuez
--

SELECT pg_catalog.setval('public.sessions_id_session_seq', 14, true);


--
-- Name: table_name_id_user_details_seq; Type: SEQUENCE SET; Schema: public; Owner: ugomugtajxtuez
--

SELECT pg_catalog.setval('public.table_name_id_user_details_seq', 13, true);


--
-- Name: user_permissions_id_seq; Type: SEQUENCE SET; Schema: public; Owner: ugomugtajxtuez
--

SELECT pg_catalog.setval('public.user_permissions_id_seq', 10, true);


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: ugomugtajxtuez
--

SELECT pg_catalog.setval('public.users_id_seq', 27, true);


--
-- Name: addresses addresses_pk; Type: CONSTRAINT; Schema: public; Owner: ugomugtajxtuez
--

ALTER TABLE ONLY public.addresses
    ADD CONSTRAINT addresses_pk PRIMARY KEY (id_address);


--
-- Name: pin-authors pin-author_relation_pk; Type: CONSTRAINT; Schema: public; Owner: ugomugtajxtuez
--

ALTER TABLE ONLY public."pin-authors"
    ADD CONSTRAINT "pin-author_relation_pk" PRIMARY KEY (id_relation);


--
-- Name: pins pins_pk; Type: CONSTRAINT; Schema: public; Owner: ugomugtajxtuez
--

ALTER TABLE ONLY public.pins
    ADD CONSTRAINT pins_pk PRIMARY KEY (id_pin);


--
-- Name: sessions sessions_pk; Type: CONSTRAINT; Schema: public; Owner: ugomugtajxtuez
--

ALTER TABLE ONLY public.sessions
    ADD CONSTRAINT sessions_pk PRIMARY KEY (id_session);


--
-- Name: users_details table_name_pk; Type: CONSTRAINT; Schema: public; Owner: ugomugtajxtuez
--

ALTER TABLE ONLY public.users_details
    ADD CONSTRAINT table_name_pk PRIMARY KEY (id_user_details);


--
-- Name: user_permissions user_permissions_pk; Type: CONSTRAINT; Schema: public; Owner: ugomugtajxtuez
--

ALTER TABLE ONLY public.user_permissions
    ADD CONSTRAINT user_permissions_pk PRIMARY KEY (id);


--
-- Name: users users_pk; Type: CONSTRAINT; Schema: public; Owner: ugomugtajxtuez
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pk PRIMARY KEY (id_user);


--
-- Name: addresses_id_address_uindex; Type: INDEX; Schema: public; Owner: ugomugtajxtuez
--

CREATE UNIQUE INDEX addresses_id_address_uindex ON public.addresses USING btree (id_address);


--
-- Name: permission_definitions_id_permission_uindex; Type: INDEX; Schema: public; Owner: ugomugtajxtuez
--

CREATE UNIQUE INDEX permission_definitions_id_permission_uindex ON public.permission_definitions USING btree (id_permission);


--
-- Name: pin-author_relation_id_relation_uindex; Type: INDEX; Schema: public; Owner: ugomugtajxtuez
--

CREATE UNIQUE INDEX "pin-author_relation_id_relation_uindex" ON public."pin-authors" USING btree (id_relation);


--
-- Name: pins_id_pin_uindex; Type: INDEX; Schema: public; Owner: ugomugtajxtuez
--

CREATE UNIQUE INDEX pins_id_pin_uindex ON public.pins USING btree (id_pin);


--
-- Name: sessions_id_session_uindex; Type: INDEX; Schema: public; Owner: ugomugtajxtuez
--

CREATE UNIQUE INDEX sessions_id_session_uindex ON public.sessions USING btree (id_session);


--
-- Name: table_name_id_user_details_uindex; Type: INDEX; Schema: public; Owner: ugomugtajxtuez
--

CREATE UNIQUE INDEX table_name_id_user_details_uindex ON public.users_details USING btree (id_user_details);


--
-- Name: user_permissions_id_uindex; Type: INDEX; Schema: public; Owner: ugomugtajxtuez
--

CREATE UNIQUE INDEX user_permissions_id_uindex ON public.user_permissions USING btree (id);


--
-- Name: user_permissions_id_user_uindex; Type: INDEX; Schema: public; Owner: ugomugtajxtuez
--

CREATE UNIQUE INDEX user_permissions_id_user_uindex ON public.user_permissions USING btree (id_user);


--
-- Name: users_details_id_user_uindex; Type: INDEX; Schema: public; Owner: ugomugtajxtuez
--

CREATE UNIQUE INDEX users_details_id_user_uindex ON public.users_details USING btree (id_user);


--
-- Name: users_id_uindex; Type: INDEX; Schema: public; Owner: ugomugtajxtuez
--

CREATE UNIQUE INDEX users_id_uindex ON public.users USING btree (id_user);


--
-- Name: users employee_insert_trigger; Type: TRIGGER; Schema: public; Owner: ugomugtajxtuez
--

CREATE TRIGGER employee_insert_trigger AFTER INSERT ON public.users FOR EACH ROW EXECUTE FUNCTION public.user_insert_trigger_fnc();


--
-- Name: addresses addresses_pins_id_pin_fk; Type: FK CONSTRAINT; Schema: public; Owner: ugomugtajxtuez
--

ALTER TABLE ONLY public.addresses
    ADD CONSTRAINT addresses_pins_id_pin_fk FOREIGN KEY (id_pin) REFERENCES public.pins(id_pin) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: pin-authors pin_fk; Type: FK CONSTRAINT; Schema: public; Owner: ugomugtajxtuez
--

ALTER TABLE ONLY public."pin-authors"
    ADD CONSTRAINT pin_fk FOREIGN KEY (id_pin) REFERENCES public.pins(id_pin) ON UPDATE CASCADE;


--
-- Name: sessions sessions_users_id_user_fk; Type: FK CONSTRAINT; Schema: public; Owner: ugomugtajxtuez
--

ALTER TABLE ONLY public.sessions
    ADD CONSTRAINT sessions_users_id_user_fk FOREIGN KEY (id_user) REFERENCES public.users(id_user);


--
-- Name: pin-authors user_fk; Type: FK CONSTRAINT; Schema: public; Owner: ugomugtajxtuez
--

ALTER TABLE ONLY public."pin-authors"
    ADD CONSTRAINT user_fk FOREIGN KEY (id_user) REFERENCES public.users(id_user) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: user_permissions user_permissions_definition__fk; Type: FK CONSTRAINT; Schema: public; Owner: ugomugtajxtuez
--

ALTER TABLE ONLY public.user_permissions
    ADD CONSTRAINT user_permissions_definition__fk FOREIGN KEY (user_role) REFERENCES public.permission_definitions(id_permission);


--
-- Name: user_permissions user_permissions_users_id_user_fk; Type: FK CONSTRAINT; Schema: public; Owner: ugomugtajxtuez
--

ALTER TABLE ONLY public.user_permissions
    ADD CONSTRAINT user_permissions_users_id_user_fk FOREIGN KEY (id_user) REFERENCES public.users(id_user) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: users_details users_details__fk; Type: FK CONSTRAINT; Schema: public; Owner: ugomugtajxtuez
--

ALTER TABLE ONLY public.users_details
    ADD CONSTRAINT users_details__fk FOREIGN KEY (id_user) REFERENCES public.users(id_user) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: SCHEMA public; Type: ACL; Schema: -; Owner: ugomugtajxtuez
--

REVOKE ALL ON SCHEMA public FROM postgres;
REVOKE ALL ON SCHEMA public FROM PUBLIC;
GRANT ALL ON SCHEMA public TO ugomugtajxtuez;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- Name: LANGUAGE plpgsql; Type: ACL; Schema: -; Owner: postgres
--

GRANT ALL ON LANGUAGE plpgsql TO ugomugtajxtuez;


--
-- PostgreSQL database dump complete
--

