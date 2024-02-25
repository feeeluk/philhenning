-- Adapted from the following source: http://www.evoluted.net/thinktank/web-development/paypal-php-integration
-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 21, 2011 at 04:39 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

CREATE TABLE payments (
  id int(6) NOT NULL AUTO_INCREMENT,
  txnid varchar(20) NOT NULL,
  payment_amount decimal(7,2) NOT NULL,
  payment_status varchar(25) NOT NULL,
  itemid varchar(25) NOT NULL,
  createdtime datetime NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM;
