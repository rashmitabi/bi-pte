<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class QuestionsReadingSectionSeeder extends Seeder
{
	 /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$check = DB::table('questions')->count();
        if($check < 1){
            DB::table('questions')->insert([
            	'id' => 1,
                'section_id' => 1,
                'test_id'=>1,
                'design_id'=>1,
                'question_type_id'=>1,
                'name'=>'Reading and Writing:Fill in the blanks(1)',
                'short_desc'=>'-',
                'desc'=>'<p>Music is an important part of our lives. We connect and interact with it daily and use it as a way of projecting our self-identities to the people around us. The music we enjoy - whether it&#39;s country or classical, rock n roll or rap &ndash; TEXTFIELD&nbsp;who we are. But where did music, at its core, first come from? It&#39;s a puzzling question that may not have a definitive answer. One&nbsp;TEXTFIELD&nbsp;researcher, however, has proposed that the key to understanding the origin of music is nestled snugly in the loving bond between mother and child. In a lecture at the University of Melbourne, Richard Parncutt, an Australian-born professor of systematic musicology, endorsed the idea that music originally spawned from&#39;motherese&#39;- the playful voices mothers&nbsp;TEXTFIELD&nbsp;when speaking to infants and toddlers. As the theory goes, increased human brain sizes caused by evolutionary changes occurring between one and 2,000,000 years ago resulted in earlier births, more fragile infants, and a&nbsp;TEXTFIELD&nbsp;need&nbsp;for stronger relationships between mothers and their newborn babies. According to Parncutt, who is based at the University of Graz in Austria,&#39; motherese&#39; arose as a way to strengthen this maternal bond and to help&nbsp;TEXTFIELD&nbsp;an infant&#39;s survival.</p>',
                'order'=>'0',
                'status'=>'E',
                'marks'=>44,
                'answer_time'=>'1',
                'waiting_time'=>'1',
                'max_time'=>'1'
            ]);

            DB::table('question_data')->insert([
            	[
            	'question_id' => 1,
            	'data_type' => 'fill in the blank1',
            	'data_value' => 'reflects, illustrates, denotes, notes'
            	],
            	[
            	'question_id' => 1,
            	'data_type' => 'fill in the blank2',
            	'data_value' => 'relevant, leading, egregious, enormous'
            	],
            	[
            	'question_id' => 1,
            	'data_type' => 'fill in the blank3',
            	'data_value' => 'adopt, accept, acclaim, abridge'
            	],
            	[
            	'question_id' => 1,
            	'data_type' => 'fill in the blank4',
            	'data_value' => 'relevant, prestigious, critical, critique'
            	],
            	[
            	'question_id' => 1,
            	'data_type' => 'fill in the blank5',
            	'data_value' => 'unsure, sure, ensure, assure'
            	],
            	[
            	'question_id' => 1,
            	'data_type' => 'fill in the blank6',
            	'data_value' => 'unsure, sure, ensure, assure'
            	],
            	[
            	'question_id' => 1,
            	'data_type' => 'fill in the blank7',
            	'data_value' => 'unsure, sure, ensure, assure'
            	],
            	[
            	'question_id' => 1,
            	'data_type' => 'fill in the blank8',
            	'data_value' => 'unsure, sure, ensure, assure'
            	]
            ]);

            DB::table('answer_data')->insert([
            	[ 
            	'question_id' => 1,
            	'answer_type' => 'fill in the blank1',
            	'answer_value' => 'reflects',
            	'sample_answer' => '-'
            	],
            	[ 
            	'question_id' => 1,
            	'answer_type' => 'fill in the blank2',
            	'answer_value' => 'leading',
            	'sample_answer' => '-'
            	],
            	[ 
            	'question_id' => 1,
            	'answer_type' => 'fill in the blank3',
            	'answer_value' => 'adopt',
            	'sample_answer' => '-'
            	],
            	[ 
            	'question_id' => 1,
            	'answer_type' => 'fill in the blank4',
            	'answer_value' => 'critique',
            	'sample_answer' => '-'
            	],
            	[ 
            	'question_id' => 1,
            	'answer_type' => 'fill in the blank5',
            	'answer_value' => 'assure',
            	'sample_answer' => '-'
            	],
            	[ 
            	'question_id' => 1,
            	'answer_type' => 'fill in the blank6',
            	'answer_value' => 'assure',
            	'sample_answer' => '-'
            	],
            	[ 
            	'question_id' => 1,
            	'answer_type' => 'fill in the blank7',
            	'answer_value' => 'assure',
            	'sample_answer' => '-'
            	],
            	[ 
            	'question_id' => 1,
            	'answer_type' => 'fill in the blank8',
            	'answer_value' => 'assure',
            	'sample_answer' => '-'
            	],
        	]);

            //second 
        	DB::table('questions')->insert([
        		'id' => 2, 
        		'section_id' => 1,
                'test_id'=>1,
                'design_id'=>1,
                'question_type_id'=>2,
                'name'=>'Reading and Writing:Fill in the blanks(2)',
                'short_desc'=>'-',
                'desc'=>'<p>Music is an important part of our lives. We connect and interact with it daily and use it as a way of projecting our self-identities to the people around us. The music we enjoy - whether it&#39;s country or classical, rock n roll or rap &ndash; TEXTFIELD&nbsp;who we are. But where did music, at its core, first come from? It&#39;s a puzzling question that may not have a definitive answer. One&nbsp;TEXTFIELD&nbsp;researcher, however, has proposed that the key to understanding the origin of music is nestled snugly in the loving bond between mother and child. In a lecture at the University of Melbourne, Richard Parncutt, an Australian-born professor of systematic musicology, endorsed the idea that music originally spawned from&#39;motherese&#39;- the playful voices mothers&nbsp;TEXTFIELD&nbsp;when speaking to infants and toddlers. As the theory goes, increased human brain sizes caused by evolutionary changes occurring between one and 2,000,000 years ago resulted in earlier births, more fragile infants, and a&nbsp;TEXTFIELD&nbsp;need&nbsp;for stronger relationships between mothers and their newborn babies. According to Parncutt, who is based at the University of Graz in Austria,&#39; motherese&#39; arose as a way to strengthen this maternal bond and to help&nbsp;TEXTFIELD&nbsp;an infant&#39;s survival.</p>',
                'order'=>'0',
                'status'=>'E',
                'marks'=>44,
                'answer_time'=>'1',
                'waiting_time'=>'1',
                'max_time'=>'1'
            ]);

            DB::table('question_data')->insert([
            	[
            	'question_id' => 2,
            	'data_type' => 'fill in the blank1',
            	'data_value' => 'reflects, illustrates, denotes, notes'
            	],
            	[
            	'question_id' => 2,
            	'data_type' => 'fill in the blank2',
            	'data_value' => 'relevant, leading, egregious, enormous'
            	],
            	[
            	'question_id' => 2,
            	'data_type' => 'fill in the blank3',
            	'data_value' => 'adopt, accept, acclaim, abridge'
            	],
            	[
            	'question_id' => 2,
            	'data_type' => 'fill in the blank4',
            	'data_value' => 'relevant, prestigious, critical, critique'
            	],
            	[
            	'question_id' => 2,
            	'data_type' => 'fill in the blank5',
            	'data_value' => 'unsure, sure, ensure, assure'
            	],
            	[
            	'question_id' => 2,
            	'data_type' => 'fill in the blank6',
            	'data_value' => 'unsure, sure, ensure, assure'
            	],
            	[
            	'question_id' => 2,
            	'data_type' => 'fill in the blank7',
            	'data_value' => 'unsure, sure, ensure, assure'
            	],
            	[
            	'question_id' => 2,
            	'data_type' => 'fill in the blank8',
            	'data_value' => 'unsure, sure, ensure, assure'
            	]
            ]);

            DB::table('answer_data')->insert([
            	[ 
            	'question_id' => 2,
            	'answer_type' => 'fill in the blank1',
            	'answer_value' => 'reflects',
            	'sample_answer' => '-'
            	],
            	[ 
            	'question_id' => 2,
            	'answer_type' => 'fill in the blank2',
            	'answer_value' => 'leading',
            	'sample_answer' => '-'
            	],
            	[ 
            	'question_id' => 2,
            	'answer_type' => 'fill in the blank3',
            	'answer_value' => 'adopt',
            	'sample_answer' => '-'
            	],
            	[ 
            	'question_id' => 2,
            	'answer_type' => 'fill in the blank4',
            	'answer_value' => 'critique',
            	'sample_answer' => '-'
            	],
            	[ 
            	'question_id' => 2,
            	'answer_type' => 'fill in the blank5',
            	'answer_value' => 'assure',
            	'sample_answer' => '-'
            	],
            	[ 
            	'question_id' => 2,
            	'answer_type' => 'fill in the blank6',
            	'answer_value' => 'assure',
            	'sample_answer' => '-'
            	],
            	[ 
            	'question_id' => 2,
            	'answer_type' => 'fill in the blank7',
            	'answer_value' => 'assure',
            	'sample_answer' => '-'
            	],
            	[ 
            	'question_id' => 2,
            	'answer_type' => 'fill in the blank8',
            	'answer_value' => 'assure',
            	'sample_answer' => '-'
            	],
        	]);

        	//third 
        	DB::table('questions')->insert([
        		'id' => 3, 
        		'section_id' => 1,
                'test_id'=>1,
                'design_id'=>1,
                'question_type_id'=>3,
                'name'=>'Reading and Writing:Fill in the blanks(3)',
                'short_desc'=>'-',
                'desc'=>'<p>Music is an important part of our lives. We connect and interact with it daily and use it as a way of projecting our self-identities to the people around us. The music we enjoy - whether it&#39;s country or classical, rock n roll or rap &ndash; TEXTFIELD&nbsp;who we are. But where did music, at its core, first come from? It&#39;s a puzzling question that may not have a definitive answer. One&nbsp;TEXTFIELD&nbsp;researcher, however, has proposed that the key to understanding the origin of music is nestled snugly in the loving bond between mother and child. In a lecture at the University of Melbourne, Richard Parncutt, an Australian-born professor of systematic musicology, endorsed the idea that music originally spawned from&#39;motherese&#39;- the playful voices mothers&nbsp;TEXTFIELD&nbsp;when speaking to infants and toddlers. As the theory goes, increased human brain sizes caused by evolutionary changes occurring between one and 2,000,000 years ago resulted in earlier births, more fragile infants, and a&nbsp;TEXTFIELD&nbsp;need&nbsp;for stronger relationships between mothers and their newborn babies. According to Parncutt, who is based at the University of Graz in Austria,&#39; motherese&#39; arose as a way to strengthen this maternal bond and to help&nbsp;TEXTFIELD&nbsp;an infant&#39;s survival.</p>',
                'order'=>'0',
                'status'=>'E',
                'marks'=>44,
                'answer_time'=>'1',
                'waiting_time'=>'1',
                'max_time'=>'1'
            ]);

            DB::table('question_data')->insert([
            	[
            	'question_id' => 3,
            	'data_type' => 'fill in the blank1',
            	'data_value' => 'reflects, illustrates, denotes, notes'
            	],
            	[
            	'question_id' => 3,
            	'data_type' => 'fill in the blank2',
            	'data_value' => 'relevant, leading, egregious, enormous'
            	],
            	[
            	'question_id' => 3,
            	'data_type' => 'fill in the blank3',
            	'data_value' => 'adopt, accept, acclaim, abridge'
            	],
            	[
            	'question_id' => 3,
            	'data_type' => 'fill in the blank4',
            	'data_value' => 'relevant, prestigious, critical, critique'
            	],
            	[
            	'question_id' => 3,
            	'data_type' => 'fill in the blank5',
            	'data_value' => 'unsure, sure, ensure, assure'
            	],
            	[
            	'question_id' => 3,
            	'data_type' => 'fill in the blank6',
            	'data_value' => 'unsure, sure, ensure, assure'
            	],
            	[
            	'question_id' => 3,
            	'data_type' => 'fill in the blank7',
            	'data_value' => 'unsure, sure, ensure, assure'
            	],
            	[
            	'question_id' => 3,
            	'data_type' => 'fill in the blank8',
            	'data_value' => 'unsure, sure, ensure, assure'
            	]
            ]);

            DB::table('answer_data')->insert([
            	[ 
            	'question_id' => 3,
            	'answer_type' => 'fill in the blank1',
            	'answer_value' => 'reflects',
            	'sample_answer' => '-'
            	],
            	[ 
            	'question_id' => 3,
            	'answer_type' => 'fill in the blank2',
            	'answer_value' => 'leading',
            	'sample_answer' => '-'
            	],
            	[ 
            	'question_id' => 3,
            	'answer_type' => 'fill in the blank3',
            	'answer_value' => 'adopt',
            	'sample_answer' => '-'
            	],
            	[ 
            	'question_id' => 3,
            	'answer_type' => 'fill in the blank4',
            	'answer_value' => 'critique',
            	'sample_answer' => '-'
            	],
            	[ 
            	'question_id' => 3,
            	'answer_type' => 'fill in the blank5',
            	'answer_value' => 'assure',
            	'sample_answer' => '-'
            	],
            	[ 
            	'question_id' => 3,
            	'answer_type' => 'fill in the blank6',
            	'answer_value' => 'assure',
            	'sample_answer' => '-'
            	],
            	[ 
            	'question_id' => 3,
            	'answer_type' => 'fill in the blank7',
            	'answer_value' => 'assure',
            	'sample_answer' => '-'
            	],
            	[ 
            	'question_id' => 3,
            	'answer_type' => 'fill in the blank8',
            	'answer_value' => 'assure',
            	'sample_answer' => '-'
            	],
        	]);

        	//four
        	DB::table('questions')->insert([
        		'id' => 4, 
        		'section_id' => 1,
                'test_id'=>1,
                'design_id'=>1,
                'question_type_id'=>4,
                'name'=>'Reading and Writing:Fill in the blanks(4)',
                'short_desc'=>'-',
                'desc'=>'<p>Music is an important part of our lives. We connect and interact with it daily and use it as a way of projecting our self-identities to the people around us. The music we enjoy - whether it&#39;s country or classical, rock n roll or rap &ndash; TEXTFIELD&nbsp;who we are. But where did music, at its core, first come from? It&#39;s a puzzling question that may not have a definitive answer. One&nbsp;TEXTFIELD&nbsp;researcher, however, has proposed that the key to understanding the origin of music is nestled snugly in the loving bond between mother and child. In a lecture at the University of Melbourne, Richard Parncutt, an Australian-born professor of systematic musicology, endorsed the idea that music originally spawned from&#39;motherese&#39;- the playful voices mothers&nbsp;TEXTFIELD&nbsp;when speaking to infants and toddlers. As the theory goes, increased human brain sizes caused by evolutionary changes occurring between one and 2,000,000 years ago resulted in earlier births, more fragile infants, and a&nbsp;TEXTFIELD&nbsp;need&nbsp;for stronger relationships between mothers and their newborn babies. According to Parncutt, who is based at the University of Graz in Austria,&#39; motherese&#39; arose as a way to strengthen this maternal bond and to help&nbsp;TEXTFIELD&nbsp;an infant&#39;s survival.</p>',
                'order'=>'0',
                'status'=>'E',
                'marks'=>44,
                'answer_time'=>'1',
                'waiting_time'=>'1',
                'max_time'=>'1'
            ]);

            DB::table('question_data')->insert([
            	[
            	'question_id' => 4,
            	'data_type' => 'fill in the blank1',
            	'data_value' => 'reflects, illustrates, denotes, notes'
            	],
            	[
            	'question_id' => 4,
            	'data_type' => 'fill in the blank2',
            	'data_value' => 'relevant, leading, egregious, enormous'
            	],
            	[
            	'question_id' => 4,
            	'data_type' => 'fill in the blank3',
            	'data_value' => 'adopt, accept, acclaim, abridge'
            	],
            	[
            	'question_id' => 4,
            	'data_type' => 'fill in the blank4',
            	'data_value' => 'relevant, prestigious, critical, critique'
            	],
            	[
            	'question_id' => 4,
            	'data_type' => 'fill in the blank5',
            	'data_value' => 'unsure, sure, ensure, assure'
            	],
            	[
            	'question_id' => 4,
            	'data_type' => 'fill in the blank6',
            	'data_value' => 'unsure, sure, ensure, assure'
            	],
            	[
            	'question_id' => 4,
            	'data_type' => 'fill in the blank7',
            	'data_value' => 'unsure, sure, ensure, assure'
            	],
            	[
            	'question_id' => 4,
            	'data_type' => 'fill in the blank8',
            	'data_value' => 'unsure, sure, ensure, assure'
            	]
            ]);

            DB::table('answer_data')->insert([
            	[ 
            	'question_id' => 4,
            	'answer_type' => 'fill in the blank1',
            	'answer_value' => 'reflects',
            	'sample_answer' => '-'
            	],
            	[ 
            	'question_id' => 4,
            	'answer_type' => 'fill in the blank2',
            	'answer_value' => 'leading',
            	'sample_answer' => '-'
            	],
            	[ 
            	'question_id' => 4,
            	'answer_type' => 'fill in the blank3',
            	'answer_value' => 'adopt',
            	'sample_answer' => '-'
            	],
            	[ 
            	'question_id' => 4,
            	'answer_type' => 'fill in the blank4',
            	'answer_value' => 'critique',
            	'sample_answer' => '-'
            	],
            	[ 
            	'question_id' => 4,
            	'answer_type' => 'fill in the blank5',
            	'answer_value' => 'assure',
            	'sample_answer' => '-'
            	],
            	[ 
            	'question_id' => 4,
            	'answer_type' => 'fill in the blank6',
            	'answer_value' => 'assure',
            	'sample_answer' => '-'
            	],
            	[ 
            	'question_id' => 4,
            	'answer_type' => 'fill in the blank7',
            	'answer_value' => 'assure',
            	'sample_answer' => '-'
            	],
            	[ 
            	'question_id' => 4,
            	'answer_type' => 'fill in the blank8',
            	'answer_value' => 'assure',
            	'sample_answer' => '-'
            	],
        	]);

        	//five
        	DB::table('questions')->insert([
        		'id' => 5, 
        		'section_id' => 1,
                'test_id'=>1,
                'design_id'=>1,
                'question_type_id'=>5,
                'name'=>'Reading and Writing:Fill in the blanks(5)',
                'short_desc'=>'-',
                'desc'=>'<p>Music is an important part of our lives. We connect and interact with it daily and use it as a way of projecting our self-identities to the people around us. The music we enjoy - whether it&#39;s country or classical, rock n roll or rap &ndash; TEXTFIELD&nbsp;who we are. But where did music, at its core, first come from? It&#39;s a puzzling question that may not have a definitive answer. One&nbsp;TEXTFIELD&nbsp;researcher, however, has proposed that the key to understanding the origin of music is nestled snugly in the loving bond between mother and child. In a lecture at the University of Melbourne, Richard Parncutt, an Australian-born professor of systematic musicology, endorsed the idea that music originally spawned from&#39;motherese&#39;- the playful voices mothers&nbsp;TEXTFIELD&nbsp;when speaking to infants and toddlers. As the theory goes, increased human brain sizes caused by evolutionary changes occurring between one and 2,000,000 years ago resulted in earlier births, more fragile infants, and a&nbsp;TEXTFIELD&nbsp;need&nbsp;for stronger relationships between mothers and their newborn babies. According to Parncutt, who is based at the University of Graz in Austria,&#39; motherese&#39; arose as a way to strengthen this maternal bond and to help&nbsp;TEXTFIELD&nbsp;an infant&#39;s survival.</p>',
                'order'=>'0',
                'status'=>'E',
                'marks'=>44,
                'answer_time'=>'1',
                'waiting_time'=>'1',
                'max_time'=>'1'
            ]);

            DB::table('question_data')->insert([
            	[
            	'question_id' => 5,
            	'data_type' => 'fill in the blank1',
            	'data_value' => 'reflects, illustrates, denotes, notes'
            	],
            	[
            	'question_id' => 5,
            	'data_type' => 'fill in the blank2',
            	'data_value' => 'relevant, leading, egregious, enormous'
            	],
            	[
            	'question_id' => 5,
            	'data_type' => 'fill in the blank3',
            	'data_value' => 'adopt, accept, acclaim, abridge'
            	],
            	[
            	'question_id' => 5,
            	'data_type' => 'fill in the blank4',
            	'data_value' => 'relevant, prestigious, critical, critique'
            	],
            	[
            	'question_id' => 5,
            	'data_type' => 'fill in the blank5',
            	'data_value' => 'unsure, sure, ensure, assure'
            	],
            	[
            	'question_id' => 5,
            	'data_type' => 'fill in the blank6',
            	'data_value' => 'unsure, sure, ensure, assure'
            	],
            	[
            	'question_id' => 5,
            	'data_type' => 'fill in the blank7',
            	'data_value' => 'unsure, sure, ensure, assure'
            	],
            	[
            	'question_id' => 5,
            	'data_type' => 'fill in the blank8',
            	'data_value' => 'unsure, sure, ensure, assure'
            	]
            ]);

            DB::table('answer_data')->insert([
            	[ 
            	'question_id' => 5,
            	'answer_type' => 'fill in the blank1',
            	'answer_value' => 'reflects',
            	'sample_answer' => '-'
            	],
            	[ 
            	'question_id' => 5,
            	'answer_type' => 'fill in the blank2',
            	'answer_value' => 'leading',
            	'sample_answer' => '-'
            	],
            	[ 
            	'question_id' => 5,
            	'answer_type' => 'fill in the blank3',
            	'answer_value' => 'adopt',
            	'sample_answer' => '-'
            	],
            	[ 
            	'question_id' => 5,
            	'answer_type' => 'fill in the blank4',
            	'answer_value' => 'critique',
            	'sample_answer' => '-'
            	],
            	[ 
            	'question_id' => 5,
            	'answer_type' => 'fill in the blank5',
            	'answer_value' => 'assure',
            	'sample_answer' => '-'
            	],
            	[ 
            	'question_id' => 5,
            	'answer_type' => 'fill in the blank6',
            	'answer_value' => 'assure',
            	'sample_answer' => '-'
            	],
            	[ 
            	'question_id' => 5,
            	'answer_type' => 'fill in the blank7',
            	'answer_value' => 'assure',
            	'sample_answer' => '-'
            	],
            	[ 
            	'question_id' => 5,
            	'answer_type' => 'fill in the blank8',
            	'answer_value' => 'assure',
            	'sample_answer' => '-'
            	]
        	]);
            //six
        	DB::table('questions')->insert([
        		'id' => 6, 
        		'section_id' => 1,
                'test_id'=>1,
                'design_id'=>2,
                'question_type_id'=>6,
                'name'=>'Which of the following achievements can be attributed to Luke Howard?',
                'short_desc'=>'-',
                'desc'=>'<p>Before Luke Howard invented his system for classifying clouds, they had simply been described by their shape and color as each person saw them: they were too changeable and moved too quickly for anyone to think they could be classified in any useful way. Howard had been interested in clouds - and meteorology in general - ever since he was a small boy, and for thirty years kept a record of his meteorological observations. In 1802-1803, he produced a paper in which he named the clouds, or, to be more precise, classified them, claiming that it was possible to identify several simple categories within the various and complex cloud forms. As was standard practice for the classification of plant and animal species, they were given Latin names, which meant that the system could be understood throughout Europe.</p>

					<p>Howard believed that all clouds belonged to three distinct groups; cumulus, stratus and cirrus. He added a fourth category, nimbus, to describe a cloud &quot;in the act of condensation into rain, hail or snow&quot;. lt is by observing how clouds change color and shape that weather can be predicted, and as long as the first three types of cloud keep their normal shape there won&#39;t be any rain.</p>

					<p>This system came to be used across the European continent, and in the 20m century his cloud classification system was adopted, with some additions, as the international standard, but that was not his only contribution to meteorology. He wrote papers on barometers and theories of rain, and what is probably the first textbook on weather. He can also be considered to be the father of what is now called &quot;urban climatology&quot;. Howard had realized that cities could significantly alter meteorological elements. One of these he called &quot;city fog&quot;. Nowadays we call it &quot;smog&quot;, a combination of smoke and fog.</p>',
                'order'=>1,
                'status'=>'E',
                'marks'=>3,
                'answer_time'=>'1',
                'waiting_time'=>'1',
                'max_time'=>'1'
            ]);

            DB::table('question_data')->insert([
            	[
            	'question_id' => 6,
            	'data_type' => 'multiple-choice-multiple-answer1',
            	'data_value' => 'He wrote a book about barometers.'
            	],
            	[
            	'question_id' => 6,
            	'data_type' => 'multiple-choice-multiple-answer2',
            	'data_value' => 'He was the first to identify and classify different cloud forms.'
            	],
            	[
            	'question_id' => 6,
            	'data_type' => 'multiple-choice-multiple-answer3',
            	'data_value' => 'He was the first to notice the different shapes and colors of clouds.'
            	],
            	[
            	'question_id' => 6,
            	'data_type' => 'multiple-choice-multiple-answer4',
            	'data_value' => 'His classification system became used all over the world.'
            	],
            	[
            	'question_id' => 6,
            	'data_type' => 'multiple-choice-multiple-answer5',
            	'data_value' => 'He realized that cities could have an effect on the weather.'
            	]
            ]);

            DB::table('answer_data')->insert([
            	[ 
            	'question_id' => 6,
            	'answer_type' => 'multiple-choice-multiple-answer',
            	'answer_value' => 'He was the first to identify and classify different cloud forms.@His classification system became used all over the world.@ He realized that cities could have an effect on the weather.',
            	'sample_answer' => '-'
            	]
        	]);
        	//seven
        	DB::table('questions')->insert([
        		'id' => 7, 
        		'section_id' => 1,
                'test_id'=>1,
                'design_id'=>2,
                'question_type_id'=>7,
                'name'=>'Which of the following achievements can be attributed to Luke Howard?',
                'short_desc'=>'-',
                'desc'=>'<p>Before Luke Howard invented his system for classifying clouds, they had simply been described by their shape and color as each person saw them: they were too changeable and moved too quickly for anyone to think they could be classified in any useful way. Howard had been interested in clouds - and meteorology in general - ever since he was a small boy, and for thirty years kept a record of his meteorological observations. In 1802-1803, he produced a paper in which he named the clouds, or, to be more precise, classified them, claiming that it was possible to identify several simple categories within the various and complex cloud forms. As was standard practice for the classification of plant and animal species, they were given Latin names, which meant that the system could be understood throughout Europe.</p>

					<p>Howard believed that all clouds belonged to three distinct groups; cumulus, stratus and cirrus. He added a fourth category, nimbus, to describe a cloud &quot;in the act of condensation into rain, hail or snow&quot;. lt is by observing how clouds change color and shape that weather can be predicted, and as long as the first three types of cloud keep their normal shape there won&#39;t be any rain.</p>

					<p>This system came to be used across the European continent, and in the 20m century his cloud classification system was adopted, with some additions, as the international standard, but that was not his only contribution to meteorology. He wrote papers on barometers and theories of rain, and what is probably the first textbook on weather. He can also be considered to be the father of what is now called &quot;urban climatology&quot;. Howard had realized that cities could significantly alter meteorological elements. One of these he called &quot;city fog&quot;. Nowadays we call it &quot;smog&quot;, a combination of smoke and fog.</p>',
                'order'=>1,
                'status'=>'E',
                'marks'=>3,
                'answer_time'=>'1',
                'waiting_time'=>'1',
                'max_time'=>'1'
            ]);

            DB::table('question_data')->insert([
            	[
            	'question_id' => 7,
            	'data_type' => 're-order paragraph1',
            	'data_value' => 'These were: stay-still, normal-walk, and fast-walk.'
            	],
            	[
            	'question_id' => 7,
            	'data_type' => 'multiple-choice-multiple-answer2',
            	'data_value' => 'He was the first to identify and classify different cloud forms.'
            	],
            	[
            	'question_id' => 7,
            	'data_type' => 'multiple-choice-multiple-answer3',
            	'data_value' => 'He was the first to notice the different shapes and colors of clouds.'
            	],
            	[
            	'question_id' => 7,
            	'data_type' => 'multiple-choice-multiple-answer4',
            	'data_value' => 'His classification system became used all over the world.'
            	],
            	[
            	'question_id' => 7,
            	'data_type' => 'multiple-choice-multiple-answer5',
            	'data_value' => 'He realized that cities could have an effect on the weather.'
            	]
            ]);

            DB::table('answer_data')->insert([
            	[ 
            	'question_id' => 7,
            	'answer_type' => 'multiple-choice-multiple-answer',
            	'answer_value' => 'He was the first to identify and classify different cloud forms.@His classification system became used all over the world.@ He realized that cities could have an effect on the weather.',
            	'sample_answer' => '-'
            	]
        	]);

            // eight
        	DB::table('questions')->insert([
        		'id' => 8, 
        		'section_id' => 1,
                'test_id'=>1,
                'design_id'=>3,
                'question_type_id'=>8,
                'name'=>'Re-order paragraph',
                'short_desc'=>'-',
                'desc'=>'',
                'order'=>1,
                'status'=>'E',
                'marks'=>6,
                'answer_time'=>'1',
                'waiting_time'=>'1',
                'max_time'=>'1'
            ]);

            DB::table('question_data')->insert([
            	[
            	'question_id' => 8,
            	'data_type' => 're-order paragraph1',
            	'data_value' => 'These were: stay-still, normal-walk, and fast-walk.'
            	],
            	[
            	'question_id' => 8,
            	'data_type' => 're-order paragraph2',
            	'data_value' => 'After a 15-minute free period, the owner-dogs pairs experienced three testing conditions presented in random order.'
            	],
            	[
            	'question_id' => 8,
            	'data_type' => 're-order paragraph3',
            	'data_value' => 'The experimenters filmed the trials as they occurred.'
            	],
            	[
            	'question_id' => 8,
            	'data_type' => 're-order paragraph4',
            	'data_value' => 'Importantly, the dogs owners were told not to look at, or talk to, their dogs - or to show any evident emotion.'
            	],
            	[
            	'question_id' => 8,
            	'data_type' => 're-order paragraph5',
            	'data_value' => 'In an experiment, 36 pet dogs were brought to an open area in Maisons-Laffitte, France, with their owners.'
            	],
            ]);

            DB::table('answer_data')->insert([
            	[ 
            	'question_id' => 8,
            	'answer_type' => 're-order paragraph1',
            	'answer_value' => 'In an experiment, 36 pet dogs were brought to an open area in Maisons-Laffitte, France, with their owners.',
            	'sample_answer' => '-'
            	],
            	[ 
            	'question_id' => 8,
            	'answer_type' => 're-order paragraph2',
            	'answer_value' => 'After a 15-minute free period, the owner-dogs pairs experienced three testing conditions presented in random order.',
            	'sample_answer' => '-'
            	],
            	[ 
            	'question_id' => 8,
            	'answer_type' => 're-order paragraph3',
            	'answer_value' => 'These were: stay-still, normal-walk, and fast-walk.',
            	'sample_answer' => '-'
            	],
            	[ 
            	'question_id' => 8,
            	'answer_type' => 're-order paragraph4',
            	'answer_value' => 'Importantly, the dogs owners were told not to look at, or talk to, their dogs - or to show any evident emotion.',
            	'sample_answer' => '-'
            	],
            	[ 
            	'question_id' => 8,
            	'answer_type' => 're-order paragraph5',
            	'answer_value' => 'The experimenters filmed the trials as they occurred.',
            	'sample_answer' => '-'
            	],
        	]);

        	// nine
        	DB::table('questions')->insert([
        		'id' => 9, 
        		'section_id' => 1,
                'test_id'=>1,
                'design_id'=>3,
                'question_type_id'=>9,
                'name'=>'Re-order paragraph',
                'short_desc'=>'-',
                'desc'=>'',
                'order'=>1,
                'status'=>'E',
                'marks'=>6,
                'answer_time'=>'1',
                'waiting_time'=>'1',
                'max_time'=>'1'
            ]);


            DB::table('question_data')->insert([
            	[
            	'question_id' => 9,
            	'data_type' => 're-order paragraph1',
            	'data_value' => 'These were: stay-still, normal-walk, and fast-walk.'
            	],
            	[
            	'question_id' => 9,
            	'data_type' => 're-order paragraph2',
            	'data_value' => 'After a 15-minute free period, the owner-dogs pairs experienced three testing conditions presented in random order.'
            	],
            	[
            	'question_id' => 9,
            	'data_type' => 're-order paragraph3',
            	'data_value' => 'The experimenters filmed the trials as they occurred.'
            	],
            	[
            	'question_id' => 9,
            	'data_type' => 're-order paragraph4',
            	'data_value' => 'Importantly, the dogs owners were told not to look at, or talk to, their dogs - or to show any evident emotion.'
            	],
            	[
            	'question_id' => 9,
            	'data_type' => 're-order paragraph5',
            	'data_value' => 'In an experiment, 36 pet dogs were brought to an open area in Maisons-Laffitte, France, with their owners.'
            	],
            ]);

            DB::table('answer_data')->insert([
            	[ 
            	'question_id' => 9,
            	'answer_type' => 're-order paragraph1',
            	'answer_value' => 'In an experiment, 36 pet dogs were brought to an open area in Maisons-Laffitte, France, with their owners.',
            	'sample_answer' => '-'
            	],
            	[ 
            	'question_id' => 9,
            	'answer_type' => 're-order paragraph2',
            	'answer_value' => 'After a 15-minute free period, the owner-dogs pairs experienced three testing conditions presented in random order.',
            	'sample_answer' => '-'
            	],
            	[ 
            	'question_id' => 9,
            	'answer_type' => 're-order paragraph3',
            	'answer_value' => 'These were: stay-still, normal-walk, and fast-walk.',
            	'sample_answer' => '-'
            	],
            	[ 
            	'question_id' => 9,
            	'answer_type' => 're-order paragraph4',
            	'answer_value' => 'Importantly, the dogs owners were told not to look at, or talk to, their dogs - or to show any evident emotion.',
            	'sample_answer' => '-'
            	],
            	[ 
            	'question_id' => 9,
            	'answer_type' => 're-order paragraph5',
            	'answer_value' => 'The experimenters filmed the trials as they occurred.',
            	'sample_answer' => '-'
            	],
        	]);

        	// ten
        	DB::table('questions')->insert([
        		'id' => 10, 
        		'section_id' => 1,
                'test_id'=>1,
                'design_id'=>4,
                'question_type_id'=>11,
                'name'=>'fill in the blanks(10)',
                'short_desc'=>'-',
                'desc'=>'<p>Differential rates of price change can also shape consumption patterns. To&nbsp;TEXT FIELD &nbsp;their needs and wants, consumers sometimes choose to&nbsp;TEXT FIELD spending on a particular product or service with spending on an alternative product or service in response to a&nbsp;TEXT FIELD &nbsp;price movement of the items.</p>',
                'order'=>1,
                'status'=>'E',
                'marks'=>15,
                'answer_time'=>'1',
                'waiting_time'=>'1',
                'max_time'=>'1'
            ]);

        	DB::table('question_data')->insert([
            	[
            	'question_id' => 10,
            	'data_type' => 'fill in the blanks1',
            	'data_value' => 'convince, pending, satisfy, substitute, assure, relative'
            	]
            ]);

            DB::table('answer_data')->insert([
            	[ 
            	'question_id' => 10,
            	'answer_type' => 'fill in the blanks1',
            	'answer_value' => 'satisfy,  substitute, relative',
            	'sample_answer' => '-'
            	]
            ]);

            // eleven
        	DB::table('questions')->insert([
        		'id' => 11, 
        		'section_id' => 1,
                'test_id'=>1,
                'design_id'=>4,
                'question_type_id'=>12,
                'name'=>'fill in the blanks(11)',
                'short_desc'=>'-',
                'desc'=>'<p>Differential rates of price change can also shape consumption patterns. To&nbsp;TEXT FIELD &nbsp;their needs and wants, consumers sometimes choose to&nbsp;TEXT FIELD spending on a particular product or service with spending on an alternative product or service in response to a&nbsp;TEXT FIELD &nbsp;price movement of the items.</p>',
                'order'=>1,
                'status'=>'E',
                'marks'=>15,
                'answer_time'=>'1',
                'waiting_time'=>'1',
                'max_time'=>'1'
            ]);

        	DB::table('question_data')->insert([
            	[
            	'question_id' => 11,
            	'data_type' => 'fill in the blanks1',
            	'data_value' => 'convince, pending, satisfy, substitute, assure, relative'
            	]
            ]);

            DB::table('answer_data')->insert([
            	[ 
            	'question_id' => 11,
            	'answer_type' => 'fill in the blanks1',
            	'answer_value' => 'satisfy,  substitute, relative',
            	'sample_answer' => '-'
            	]
            ]);

            // 12
        	DB::table('questions')->insert([
        		'id' => 12, 
        		'section_id' => 1,
                'test_id'=>1,
                'design_id'=>4,
                'question_type_id'=>13,
                'name'=>'fill in the blanks(12)',
                'short_desc'=>'-',
                'desc'=>'<p>Differential rates of price change can also shape consumption patterns. To&nbsp;TEXT FIELD &nbsp;their needs and wants, consumers sometimes choose to&nbsp;TEXT FIELD spending on a particular product or service with spending on an alternative product or service in response to a&nbsp;TEXT FIELD &nbsp;price movement of the items.</p>',
                'order'=>1,
                'status'=>'E',
                'marks'=>15,
                'answer_time'=>'1',
                'waiting_time'=>'1',
                'max_time'=>'1'
            ]);

        	DB::table('question_data')->insert([
            	[
            	'question_id' => 12,
            	'data_type' => 'fill in the blanks1',
            	'data_value' => 'convince, pending, satisfy, substitute, assure, relative'
            	]
            ]);

            DB::table('answer_data')->insert([
            	[ 
            	'question_id' => 12,
            	'answer_type' => 'fill in the blanks1',
            	'answer_value' => 'satisfy,  substitute, relative',
            	'sample_answer' => '-'
            	]
            ]);

             // 13
        	DB::table('questions')->insert([
        		'id' => 13, 
        		'section_id' => 1,
                'test_id'=>1,
                'design_id'=>4,
                'question_type_id'=>14,
                'name'=>'fill in the blanks(13)',
                'short_desc'=>'-',
                'desc'=>'<p>Differential rates of price change can also shape consumption patterns. To&nbsp;TEXT FIELD &nbsp;their needs and wants, consumers sometimes choose to&nbsp;TEXT FIELD spending on a particular product or service with spending on an alternative product or service in response to a&nbsp;TEXT FIELD &nbsp;price movement of the items.</p>',
                'order'=>1,
                'status'=>'E',
                'marks'=>15,
                'answer_time'=>'1',
                'waiting_time'=>'1',
                'max_time'=>'1'
            ]);

        	DB::table('question_data')->insert([
            	[
            	'question_id' => 13,
            	'data_type' => 'fill in the blanks1',
            	'data_value' => 'convince, pending, satisfy, substitute, assure, relative'
            	]
            ]);

            DB::table('answer_data')->insert([
            	[ 
            	'question_id' => 13,
            	'answer_type' => 'fill in the blanks1',
            	'answer_value' => 'satisfy,  substitute, relative',
            	'sample_answer' => '-'
            	]
            ]);


            DB::table('questions')->insert([
        		'id' => 14, 
        		'section_id' => 1,
                'test_id'=>1,
                'design_id'=>5,
                'question_type_id'=>14,
                'name'=>'Which of the following achievements can be attributed to Luke Howard?',
                'short_desc'=>'-',
                'desc'=>'<p>Before Luke Howard invented his system for classifying clouds, they had simply been described by their shape and color as each person saw them: they were too changeable and moved too quickly for anyone to think they could be classified in any useful way. Howard had been interested in clouds - and meteorology in general - ever since he was a small boy, and for thirty years kept a record of his meteorological observations. In 1802-1803, he produced a paper in which he named the clouds, or, to be more precise, classified them, claiming that it was possible to identify several simple categories within the various and complex cloud forms. As was standard practice for the classification of plant and animal species, they were given Latin names, which meant that the system could be understood throughout Europe.</p>

					<p>Howard believed that all clouds belonged to three distinct groups; cumulus, stratus and cirrus. He added a fourth category, nimbus, to describe a cloud &quot;in the act of condensation into rain, hail or snow&quot;. lt is by observing how clouds change color and shape that weather can be predicted, and as long as the first three types of cloud keep their normal shape there won&#39;t be any rain.</p>

					<p>This system came to be used across the European continent, and in the 20m century his cloud classification system was adopted, with some additions, as the international standard, but that was not his only contribution to meteorology. He wrote papers on barometers and theories of rain, and what is probably the first textbook on weather. He can also be considered to be the father of what is now called &quot;urban climatology&quot;. Howard had realized that cities could significantly alter meteorological elements. One of these he called &quot;city fog&quot;. Nowadays we call it &quot;smog&quot;, a combination of smoke and fog.</p>',
                'order'=>1,
                'status'=>'E',
                'marks'=>1,
                'answer_time'=>'1',
                'waiting_time'=>'1',
                'max_time'=>'1'
            ]);

            DB::table('question_data')->insert([
            	[
            	'question_id' => 14,
            	'data_type' => 'multiple-choice-multiple-answer1',
            	'data_value' => 'He wrote a book about barometers.'
            	],
            	[
            	'question_id' => 14,
            	'data_type' => 'multiple-choice-multiple-answer2',
            	'data_value' => 'He was the first to identify and classify different cloud forms.'
            	],
            	[
            	'question_id' => 14,
            	'data_type' => 'multiple-choice-multiple-answer3',
            	'data_value' => 'He was the first to notice the different shapes and colors of clouds.'
            	],
            	[
            	'question_id' => 14,
            	'data_type' => 'multiple-choice-multiple-answer4',
            	'data_value' => 'His classification system became used all over the world.'
            	],
            	[
            	'question_id' => 14,
            	'data_type' => 'multiple-choice-multiple-answer5',
            	'data_value' => 'He realized that cities could have an effect on the weather.'
            	]
            ]);

            DB::table('answer_data')->insert([
            	[ 
            	'question_id' => 14,
            	'answer_type' => 'multiple-choice-multiple-answer',
            	'answer_value' => 'He was the first to identify and classify different cloud forms.@His classification system became used all over the world.@ He realized that cities could have an effect on the weather.',
            	'sample_answer' => '-'
            	]
        	]);

            DB::table('questions')->insert([
        		'id' => 15, 
        		'section_id' => 1,
                'test_id'=>1,
                'design_id'=>5,
                'question_type_id'=>15,
                'name'=>'Which of the following achievements can be attributed to Luke Howard?',
                'short_desc'=>'-',
                'desc'=>'<p>Before Luke Howard invented his system for classifying clouds, they had simply been described by their shape and color as each person saw them: they were too changeable and moved too quickly for anyone to think they could be classified in any useful way. Howard had been interested in clouds - and meteorology in general - ever since he was a small boy, and for thirty years kept a record of his meteorological observations. In 1802-1803, he produced a paper in which he named the clouds, or, to be more precise, classified them, claiming that it was possible to identify several simple categories within the various and complex cloud forms. As was standard practice for the classification of plant and animal species, they were given Latin names, which meant that the system could be understood throughout Europe.</p>

					<p>Howard believed that all clouds belonged to three distinct groups; cumulus, stratus and cirrus. He added a fourth category, nimbus, to describe a cloud &quot;in the act of condensation into rain, hail or snow&quot;. lt is by observing how clouds change color and shape that weather can be predicted, and as long as the first three types of cloud keep their normal shape there won&#39;t be any rain.</p>

					<p>This system came to be used across the European continent, and in the 20m century his cloud classification system was adopted, with some additions, as the international standard, but that was not his only contribution to meteorology. He wrote papers on barometers and theories of rain, and what is probably the first textbook on weather. He can also be considered to be the father of what is now called &quot;urban climatology&quot;. Howard had realized that cities could significantly alter meteorological elements. One of these he called &quot;city fog&quot;. Nowadays we call it &quot;smog&quot;, a combination of smoke and fog.</p>',
                'order'=>1,
                'status'=>'E',
                'marks'=>1,
                'answer_time'=>'1',
                'waiting_time'=>'1',
                'max_time'=>'1'
            ]);

            DB::table('question_data')->insert([
            	[
            	'question_id' => 15,
            	'data_type' => 'multiple-choice-multiple-answer1',
            	'data_value' => 'He wrote a book about barometers.'
            	],
            	[
            	'question_id' => 15,
            	'data_type' => 'multiple-choice-multiple-answer2',
            	'data_value' => 'He was the first to identify and classify different cloud forms.'
            	],
            	[
            	'question_id' => 15,
            	'data_type' => 'multiple-choice-multiple-answer3',
            	'data_value' => 'He was the first to notice the different shapes and colors of clouds.'
            	],
            	[
            	'question_id' => 15,
            	'data_type' => 'multiple-choice-multiple-answer4',
            	'data_value' => 'His classification system became used all over the world.'
            	],
            	[
            	'question_id' => 15,
            	'data_type' => 'multiple-choice-multiple-answer5',
            	'data_value' => 'He realized that cities could have an effect on the weather.'
            	]
            ]);

            DB::table('answer_data')->insert([
            	[ 
            	'question_id' => 15,
            	'answer_type' => 'multiple-choice-multiple-answer',
            	'answer_value' => 'He was the first to identify and classify different cloud forms.@His classification system became used all over the world.@ He realized that cities could have an effect on the weather.',
            	'sample_answer' => '-'
            	]
        	]);


        }
    }
} ?>