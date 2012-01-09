#!/usr/bin/perl

use strict;
use warnings;
use Data::Dumper;
use Encode;
my @cursos;

open(F, "<", "cursos_UM.txt");

while(<F>){
	push(@cursos, decode("iso-8859-1",$_));
}
close F;

@cursos = sort(@cursos);

#print Dumper @cursos;

print '<?xml version="1.0" encoding="ISO-8859-1"?>'."\n";
print "<cursos>\n";
my $id = 1;
for(@cursos){
	chomp;
	print "\t<curso>\n";
	print "\t\t<id>$id</id>\n";
	print "\t\t<nome>".encode("iso-8859-1", $_) . "</nome>\n";
	print "\t</curso>\n";
	$id++;
}
print "</cursos>";


__END__

=head1 NAME
	
	- 
=head1 SYNOPSIS

=head1 DESCRIPTION

=head1 AUTHOR

	Miguel Costa

=head1 SEE ALSO

